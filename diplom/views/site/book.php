<?php

/* @var $this yii\web\View */
/* @var $id int */
/* @var $name string */
/* @var $fileName string */

use yii\helpers\Html;

$this->registerCssFile("css/book.css");


$this->title = $name;
?>
<div class="site-book">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php
    include "books/".$fileName.".html";
    ?>

</div>

