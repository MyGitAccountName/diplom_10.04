<?php

/* @var $this yii\web\View */
/* @var $objectType string */

use yii\helpers\Html;

$objectType = Yii::$app->request->get('objectType');

switch ($objectType) {
    case 'question': {
        $this->title = 'Редактор вопросов';
        break;
    }
    case 'test': {
        $this->title = 'Редактор тестов';
        break;
    }
    case 'book': {
        $this->title = 'Редактор учебников';
        break;
    }
}


//$this->title = 'Редактор вопросов';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>