<?php

namespace app\modules\admin\controllers;

use yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use app\models\LoginForm;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
    // * @return string
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => [/*'index',*/'logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->login);
                        }
                    ],
                ],
            ],
/*            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $session = Yii::$app->session;
        $session->open();

        $session->set('request',$session->get('request2'));
        $session->set('request2',Yii::$app->request->referrer);

        $model = new LoginForm();
        //       if ($model->load(Yii::$app->request->post()) && $model->login()) {
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {

            // $user = new User();
            $user = $model->getUser();
            $session->set('avatar', $user->getId() . '.' . $user->avatar);

            return $this->redirect( Yii::app()->createUrl('admin/index'));
        }

/*        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);*/
    }
}
