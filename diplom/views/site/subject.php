<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use app\components\Banner;

$subject = Yii::$app->request->get('subjectName');
$subjectKey = Yii::$app->request->get('subjectKey');

$this->title = $subject;

//$this->registerCssFile("css/russian.css");
//$this->registerCssFile("css/literature.css");
$this->registerCssFile("css/subjects.css");
$this->registerCssFile("css/svg.css");
$this->registerCssFile("css/site.css");
?>
<div class="subject">
    <div class="subjectContent">
        <h1><?= Html::encode($this->title) ?></h1>

        <div id="subjectTop">
            <div class="check"><label><input type="checkbox" value="1" id="testsCB" checked><span data-f="test">Тесты</span></label></div>
            <?= \app\components\Banner::widget(['subject' => $subjectKey]); ?>
            <div class="check"><label><input type="checkbox" value="2" id="booksCB" checked><span data-f="book">Учебники</span></label></div>
        </div>

        <?= \app\components\ClassList::widget(['subject' => $subjectKey]); ?>

        <?= \app\components\Materials::widget(['subject' => $subjectKey,'subjectName' => $subject]);?>
        <?/*= \app\components\Materials::widget(['subject' => $subjectKey]); */?>
    </div>

    <aside id = "subjectFilters">
        <ul>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['test/show'])?>">тесты</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Литература', 'subjectKey' => 2])?>">Литература</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Математика', 'subjectKey' => 3])?>">Математика</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'История', 'subjectKey' => 4])?>">История</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Информатика', 'subjectKey' => 5])?>">Информатика</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Физика', 'subjectKey' => 6])?>">Физика</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Химия', 'subjectKey' => 7])?>">Химия</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'География', 'subjectKey' => 8])?>">География</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Биология', 'subjectKey' => 9])?>">Биология</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Английский язык', 'subjectKey' => 10])?>">Английский&nbsp;язык</a></li>
            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Обществознание', 'subjectKey' => 11])?>">Обществознание</a></li>
        </ul>
    </aside>

</div>
