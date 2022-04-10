<?php


namespace app\modules\admin\controllers;

use app\models\NewquestionForm;
use app\modules\admin\admin;
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
use app\models\Question;
use app\models\QuestionSearch;
use app\models\Test;
use app\models\Book;
use yii\web\Session;
use yii\web\NotFoundHttpException;

class RedactorsController extends Controller
{


    public function actionRedactor()
    {
        return $this->render('redactor');
    }

    public function actionQuestion()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('question', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

      //  return $this->render('question');
    }

/*    public function actionQuestion2()
    {
        return $this->render('newQuestion');
    }*/


    public function actionNewquestion()
    {
        $session = Yii::$app->session;
        $session->open();


        $model = new NewquestionForm();

        if (Yii::$app->request->isPost) {
            // $model->load(\Yii::$app->request->post());

            if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
                //$model->image = UploadedFile::getInstance($model, 'image');


                $question = new Question();
                $question->subject = $model->subject;
                $question->theme1 = $model->theme1;
                $question->theme2 = $model->theme2;
                $question->class = $model->class+1;
                $question->type = $model->type;
                $question->text = $model->text;
                $question->var1 = $model->var1;
                $question->var2 = $model->var2;
                $question->var3 = $model->var3;
                $question->var4 = $model->var4;
                $question->answer = $model->answer;
                $question->media = $model->media;
                $question->hint = $model->hint;


/*                $user->image = UploadedFile::getInstance($model, 'image');
                $user->avatar = $user->getExtension();*/

                if ($question->save()) {
                    //               echo "Запись!";
                    $questionId = \Yii::$app->db->lastInsertID;

                    /*Yii::$app->user->login($user);*/
                    return $this->refresh();

                    // return $this->render('signup', ['model' => $model]);
                }
                // return $this->render('signup', ['model' => $model]);
            }
        }
        return $this->render('newQuestion', ['model' => $model]);

    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
           // echo '<script>alert("yes");</script>';
            return $this->redirect(['question']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}