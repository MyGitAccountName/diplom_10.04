<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Редактор вопросов';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <a href="<?=Yii::$app->urlManager->createUrl(['admin/redactors/newquestion'])?>" class = "btn btn-primary">Добавить вопрос</a>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'Вопросы c <b>{begin}</b> по <b>{end}</b> (всего: <b style="color: #007bff">{totalCount}</b>)',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            ['attribute' => 'id', 'label' => '№', 'filter' => false],
            ['attribute' => 'subject', 'label' => 'Предмет'],
            ['attribute' => 'theme1', 'label' => 'Тема 1'],
            ['attribute' => 'theme2', 'label' => 'Тема 2'],
            ['attribute' => 'class', 'label' => 'Класс'],
            ['attribute' => 'text', 'label' => 'Вопрос'],
            ['attribute' => 'type', 'label' => 'Тип'],
            ['attribute' => 'var1', 'label' => 'Вар. 1'],
            ['attribute' => 'var2', 'label' => 'Вар. 2'],
            ['attribute' => 'var3', 'label' => 'Вар. 3'],
            ['attribute' => 'var4', 'label' => 'Вар. 4'],
            ['attribute' => 'answer', 'label' => 'Правильный'],
            ['attribute' => 'hint', 'label' => 'Подсказка'],
            ['attribute' => 'media', 'label' => 'Файл'],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'<b style="color: #007bff">Действия</b>',
            ],
        ],
    ]); ?>

</div>