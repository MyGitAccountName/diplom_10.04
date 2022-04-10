<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = 'Редактирование вопроса №' . $model->id;
?>

<!--<div class="messages-update">-->

<div>
    <?php
/*    if ($model->User != Yii::$app->user->identity->id)
    {
        echo "<h2>Изменять можно только свои сообщения!</h2>";
    }
    else*/
        echo '<h1>'.Html::encode($this->title).'</h1>'.
            $this->render('correctQuestion', [
                'model' => $model,
            ])
    ?>

</div>