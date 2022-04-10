<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
//use yii\imagine\Image;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Test;
use app\models\Book;
use  yii\web\Session;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index',['avatar' => Yii::$app->session->get('avatar')]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $session = Yii::$app->session;
        $session->open();

        $session->set('request',$session->get('request2'));
        $session->set('request2',Yii::$app->request->referrer);

        $model = new LoginForm();
/*        if ($model->load(Yii::$app->request->post()) && $model->login()) {

           // $user = new User();
            $user = $model->getUser();
            $session->set('avatar', $user->getId() . '.' . $user->avatar);

            return $this->redirect($session->get('request'));
        }*/


        if ($model->load(Yii::$app->request->post())) {
            if ($model->loginAdmin()) {
                $user = $model->getUser();
                $session->set('avatar', $user->getId() . '.' . $user->avatar);

                $url = 'index.php?r=admin';
                return $this->redirect($url);
            }
            if ($model->login()) {
                $user = $model->getUser();
                $session->set('avatar', $user->getId() . '.' . $user->avatar);
                return $this->redirect($session->get('request'));
            }

        }



        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionSignup()
    {
        $session = Yii::$app->session;
        //$session = new Session;
        $session->open();


        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();

        if (Yii::$app->request->isPost) {
            // $model->load(\Yii::$app->request->post());

            if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
                //$model->image = UploadedFile::getInstance($model, 'image');


                $user = new User();
                $user->login = $model->Login;
                $user->name = $model->Name;
                $user->surname = $model->SurName;
                $user->birthday = $model->convertToDate($model->Birthday);
                $user->password = \Yii::$app->security->generatePasswordHash($model->Password);

                $user->image = UploadedFile::getInstance($model, 'image');
                //$user->image = (UploadedFile::getInstance($model, 'image')) ?: '';

                $user->avatar = $user->getExtension();

                // $userId = $user->getId();
                //$userId = Yii::$app->db->getLastInsertID();

                //     $userId = $user::find()->max('id') + 1;
                //     $user->avatar = $userId;

                //   $model->upload($userId);

                //  echo '<img src="uploads/7.png" alt="фото">';
                if ($user->save()) {
                    //               echo "Запись!";
                    $userId = \Yii::$app->db->lastInsertID;
                    //var_dump(+$userId);
                    //$model->upload($userId);
                    $user->upload($userId);
                    $session->set('avatar', $userId . '.' . $user->avatar);

                    Yii::$app->user->login($user);
                    return $this->goHome();

                    // return $this->render('signup', ['model' => $model]);
                }
                // return $this->render('signup', ['model' => $model]);
            }
        }
            return $this->render('signup', ['model' => $model]);

            /*        if($model->load(\Yii::$app->request->post()) && $model->validate()){
                        $model->image = UploadedFile::getInstance($model, 'image');
                        $model->upload();
                        /*$path = Yii::$app->params['pathUploads'] . 'test/';*/
            /*           $path = Yii::getAlias( 'pic/avatars/');
                       echo $path;

                       //$model->Avatar->saveAs( $path . $model->Avatar);

                       $user = new User();
                       $user->login = $model->Login;
                       $user->name = $model->Name;
                       $user->surname = $model->SurName;
                       $user->birthday = $model->Birthday;
                       $user->password = \Yii::$app->security->generatePasswordHash($model->Password);
                       $user->avatar = $model->image;
                       if($user->save()){
                           Yii::$app->user->login($user);
                           return $this->goHome();
                       }
                   }
                   return $this->render('signup', compact('model'));*/

    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionTests()
    {
        return $this->render('tests');
    }
    public function actionGuide()
    {
        return $this->render('guide');
    }
    public function actionComment()
    {
        return $this->render('comment');
    }
    public function actionSubject()
    {
        return $this->render('subject');
        //Yii::$app->runAction('test/show');
    }
    public function actionTest($id)
    {
        $testModel = Test::findOne($id);
        return $this->render('test', ['test' => $testModel]);
    }
    public function actionBook($id)
    {
        $bookModel = Book::findOne($id);
        $subjects = array();
        foreach ($bookModel->subject1 as $subject):
            array_push($subjects, ['sName' => $subject->subjectName, 'sKey' => $subject->id]);
        endforeach;
        $dataBook = array(
            "id" => $id,
            "name" => $bookModel->name,
            "fileName" => $bookModel->file_name,
            "subjects" => $subjects,
        );

        return $this->render('book', $dataBook);
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }



    public function createDirectory($path) {
        //$filename = "/folder/{$dirname}/";
        if (file_exists($path)) {
            //echo "The directory {$path} exists";
        } else {
            mkdir($path, 0775, true);
            //echo "The directory {$path} was successfully created.";
        }
    }
}
