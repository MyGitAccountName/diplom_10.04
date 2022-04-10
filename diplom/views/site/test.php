<?php

/* @var $this yii\web\View */
/* @var $test app\models\Test */

use yii\helpers\Html;



//$test = Yii::$app->request->get('model');

//$testName = Yii::$app->request->get('testName');
//$subjectKey = Yii::$app->request->get('subjectKey');
$subject = Yii::$app->request->get('subjectName');

//$subject = getSubjectName($subjectKey);

//$this->title = 'Тест: "'. $testName . '"';
$this->title = 'Тест: "'. $test->name . '"';

//$subjectKey = $test->subject1->SubjectName;
//var_dump($subjectKey);

$questionList = explode(",", $test->questions );
//var_dump($questionList);
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
$difficulty = $test->difficulty;
$time = $test->questionTime*$size;

?>
<div class="site-test">
    <h1><?= Html::encode($this->title) ?></h1>
    <a class="testSubject" href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => $subject, 'subjectKey' => $test->subject])?>"><?= $subject ?></a>

    <p class="testInfo">В тесте <?=$size?> вопросов</p>
    <p class="testInfo">Сложность: <?=$difficulty?></p>
    <p class="testInfo">Время на прохождение теста: <?=intdiv($time,60)?> минут <?= $time % 60 ?> секунд</p>

    <?= Yii::$app->user->isGuest ? "<span class='alert'>Для прохождения теста необходима <a href=".Yii::$app->urlManager->createUrl(['site/login']).">авторизация</a>!</span>" :
    "<a class = 'button' href=".Yii::$app->urlManager->createUrl(['site/testing',]).">Начать</a>"?>


    <?php //var_dump($questionList); ?>
  <?php //var_dump($time); ?>



</div>
