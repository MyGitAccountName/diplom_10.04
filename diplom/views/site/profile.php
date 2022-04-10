<?php

/* @var $this yii\web\View */
/* @var $login string */

use yii\helpers\Html;

$login = Yii::$app->request->get('login');

$this->title = 'Профиль '.$login ;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Profile
    </p>

</div>

