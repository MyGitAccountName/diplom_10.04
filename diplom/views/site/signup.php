<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\SignupFormForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;

$this->title = 'Регистрация';
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]) ?>

    <?= $form->field($model, 'Login')->textInput(['class' => 'form-control col-lg-5']) ?>
    <?= $form->field($model, 'SurName')->textInput(['class' => 'form-control col-lg-5', 'placeholder' => ('Фамилия')]) ?>
    <?= $form->field($model, 'Name')->textInput(['class' => 'form-control col-lg-5', 'placeholder' => ('Имя')]) ?>
    <?= $form->field($model, 'Birthday')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '1.2.y',
        'options' => [
            'class' => 'form-control col-lg-5 placeholder-style',
            /*'id' => 'birthday',*/
            'placeholder' => ('дд.мм.гггг')
        ],
        'clientOptions' => [
            'clearIncomplete' => true,
            'alias' => 'date',

                "placeholder" => "дд.мм.гггг",
                "separator" => "."
        ]
    ]) ?>



    <?= $form->field($model, 'Password')->passwordInput(['class' => 'form-control col-lg-5']) ?>
    <?= $form->field($model, 'Confirm')->passwordInput(['class' => 'form-control col-lg-5']) ?>

    <?= $form->field($model, 'image')->FileInput();   ?>

    <?php if($model->image): ?>
        <img src="/images/avatars/<?= $model->image?>" alt="">
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>