<?php

/* @var $this yii\web\View */
/* @var $id int */
/* @var $name string */
/* @var $subjects array */
/* @var $size int */
/* @var $difficulty int */
/* @var $time int */
/* @var $questionList array */


use yii\helpers\Html;

$this->title = 'Тест: "'. $name . '"';


?>

<div class="site-test">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($subjects as $subject):
    echo '<a class="testSubject" href="'.Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => $subject['sName'], 'subjectKey' => $subject['sKey']]).'">'. $subject['sName'] ."</a><br>";
endforeach;

//var_dump($questionList);
    ?>
    <p class="testInfo">В тесте <?=$size?> вопросов</p>
    <p class="testInfo">Сложность: <?=$difficulty?></p>
    <p class="testInfo">Время на прохождение теста: <?=intdiv($time,60)?> минут <?=$time % 60 == 0 ? "" : ($time % 60) . " секунд" ?></p>

    <?= Yii::$app->user->isGuest ? "<span class='alert'>Для прохождения теста необходима <a href=".Yii::$app->urlManager->createUrl(['site/login']).">авторизация</a>!</span>" :
        "<a class = 'button' href=".Yii::$app->urlManager->createUrl(['test/testing', 'testName' => $name, 'curQuestion' => 0, 'time' => $time]).">Начать</a>"?>


    <?php //var_dump($questionList); ?>
    <?php //var_dump($time); ?>



</div>
