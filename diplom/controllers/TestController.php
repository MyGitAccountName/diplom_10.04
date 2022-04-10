<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\Test;
use app\models\Theme;

use app\models\Question;


use yii\web\Session;



class TestController extends Controller
{
    public function actionShow()
    {
      //  $theme2 = Test::find()->one()->getTheme1();
  //      $theme = Theme::find()->where(['id' => 3])->one();
 //       echo $theme->subtheme;
 //       echo "<br>";

        $tests = Test::find()->all();

        foreach ($tests as $test):
            echo $test->name;
            echo "<br>";
         //   echo $test->theme11->subtheme;
         //   echo "<br>";
         //   echo $test->theme12->subtheme;

            foreach ($test->theme13 as $theme):
                echo $theme->subtheme;
                echo "<br>";
            endforeach;

//            echo Theme::findOne($test->theme1)->subtheme;
            echo "<br>";
 //           echo Theme::findOne($test->theme2)->subtheme;
            echo "<br>";
  //          echo Theme::findOne($test->theme3)->subtheme;
  //          echo $test->theme3;
        endforeach;

    }

    public function actionTest($id)
    {
        $session = Yii::$app->session;
        $session->open();



        $testModel = Test::findOne($id);
        $subjects = array();
       // var_dump($testModel->subject1);

/*        if (Yii::$app->getUser()->isGuest) {
            $session->set('request',Yii::$app->getRequest()->url);
        }*/


        foreach ($testModel->subject1 as $subject):
       //     echo $subject->subjectName;
      //      echo "<br>";
            array_push($subjects, ['sName' => $subject->subjectName, 'sKey' => $subject->id]);

        endforeach;


        $questionList = explode(",", $testModel->questions );
        foreach ($questionList as $q):
            if (preg_match("/\[([0-9-]+?)\]/", $q, $res))
            {
                // var_dump($q);
                //  var_dump($res[1]);
                unset($questionList[array_search($q, $questionList)]);
                $borders = explode("-", $res[1]);
                for ($num = +$borders[0]; $num <= $borders[1]; $num++)
                {
                    array_push($questionList, $num);
                }
            }
            $questionList  = array_map('intval',$questionList);
        endforeach;

        shuffle($questionList); //случайный порядок
        $size = count($questionList);
      //  $difficulty = $testModel->difficulty;
      //  $time = $testModel->questionTime*$size;

        $dataTest = array(
            "id" => $id,
            "name" => $testModel->name,
            "subjects" => $subjects,
            "size" => $size,
            "difficulty" => $testModel->difficulty,
            "time" => $testModel->questionTime*$size,
            "questionList" => $questionList,
         );

        $session->set('questionList',$questionList);
        $session->set('testName',$testModel->name);
        $session->set('curQuestion',0);
        $session->set('time',$testModel->questionTime*$size);

        //var_dump($dataTest);

      //  $subject = $testModel->subject1->subjectName;
        //  var_dump($testModel);
        //var_dump($subject);
        return $this->render('test', $dataTest);

       // return $this->render('test', ['test' => $testModel]);
    }

    public function actionTesting($testName, $curQuestion, $time)
    {
        $session = Yii::$app->session;
        $session->open();

        $session->set('curRes',0);

        $questionList = $session->get('questionList');
        $size = count($questionList);

        $dataArray = [];




        foreach ($questionList as $questionNum):
            $questionModel = Question::findOne($questionNum);
            $vars = [];
            if ($questionModel->var1) array_push($vars,$questionModel->var1);
            if ($questionModel->var2) array_push($vars,$questionModel->var2);
            if ($questionModel->var3) array_push($vars,$questionModel->var3);
            if ($questionModel->var4) array_push($vars,$questionModel->var4);

            $dataQuestion = [   'type' => $questionModel->type,
                                'text' => $questionModel->text,
                                'var1' => $questionModel->var1,
                                'var2' => $questionModel->var2,
                                'var3' => $questionModel->var3,
                                'var4' => $questionModel->var4,
                                'vars' => $vars,
                                'answer' => $questionModel->answer,
                                'hint' => $questionModel->hint,
                                'media' => $questionModel->media,
                                'subject' => $questionModel->subject,
                                'theme1' => $questionModel->theme1,
                                'theme2' => $questionModel->theme2,
                                'class' => $questionModel->class,
                ];
            array_push($dataArray, $dataQuestion);
        endforeach;

        return $this->render('testing', ["testName" => $testName,
            "size" => $size,
            "time" => $time,
            "questions" => $dataArray]);

/*        $questionModel = Question::findOne($questionList[$curQuestion]);

        $dataQuestion = array(
            "question" => $questionModel,
            "questionNum" => $curQuestion,
            "testName" => $testName,
            "size" => $size,
            "time" => $time,
            "questionList" => $questionList,
            "subject" => $questionModel->subject,
            "questionText" => $questionModel->text,
            "type" => $questionModel->type,
            "vars" => [$questionModel->var1, $questionModel->var2, $questionModel->var3, $questionModel->var4],
            "answer" => $questionModel->answer,
            "hint" => $questionModel->hint,
        );*/
//        return $this->render('testing', $dataQuestion);


    }

    public function actionResult()
    {
        return $this->render('result');
    }


}