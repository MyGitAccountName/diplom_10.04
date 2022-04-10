<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\NewQuestionForm */


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;
use \app\models\Subject;
use \app\models\Theme;
use \app\models\QType;
use \app\models\Question;

?>

<div class="newQuestion">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]) ?>


    <?= $form->field($model, 'subject')->dropDownList(ArrayHelper::map(Subject::find()->all(), 'id', 'subjectName'),
        ['id' => 'qSubjectField', 'class' => 'form-control col-lg-5'])->label('Предмет:'); ?>

<!--    --><?/*= $form->field($model, 'theme1')->dropDownList(ArrayHelper::map(Theme::find()->where("subject=1")->all(), 'id', 'subtheme'),
        ['id' => 'qTheme1Field', 'class' => 'form-control col-lg-5']); */?>

    <?= $form->field($model, 'theme1')->dropDownList(ArrayHelper::map(Theme::find()->all(), 'id', 'subtheme'),
        ['id' => 'qTheme1Field', 'class' => 'form-control col-lg-5'])->label('Тема 1:'); ?>

    <?= $form->field($model, 'theme2')->dropDownList(ArrayHelper::map(Theme::find()->where("subject=1")->all(), 'id', 'subtheme'),
        ['id' => 'qTheme2Field', 'class' => 'form-control col-lg-5', 'prompt' => '-'])->label('Тема 2:'); ?>

    <?= $form->field($model, 'class')->dropDownList([1,2,3,4,5,6,7,8,9,10,11],  ['id' => 'classField', 'class' => 'form-control col-lg-5'])->label('Класс:'); ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(QType::find()->all(), 'id', 'Type'),
        ['id' => 'qTypeField', 'class' => 'form-control col-lg-5'])->label('Тип вопроса:'); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => '3',
        'id' => 'qTextField', 'class' => 'form-control col-lg-5'])->label('Вопрос:'); ?>

    <?= $form->field($model, 'var1')->textInput(['id' => 'qVar1Field', 'class' => 'form-control col-lg-5'])->label('Вариант 1:'); ?>
    <?= $form->field($model, 'var2')->textInput(['id' => 'qVar2Field', 'class' => 'form-control col-lg-5'])->label('Вариант 2:'); ?>
    <?= $form->field($model, 'var3')->textInput(['id' => 'qVar3Field', 'class' => 'form-control col-lg-5'])->label('Вариант 3:'); ?>
    <?= $form->field($model, 'var4')->textInput(['id' => 'qVar4Field', 'class' => 'form-control col-lg-5'])->label('Вариант 4:'); ?>

    <?= $form->field($model, 'answer')->textInput(['id' => 'qAnswerField', 'class' => 'form-control col-lg-5'])->label('Правильный ответ(ы):'); ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => '2',
        'id' => 'qHintField', 'class' => 'form-control col-lg-5'])->label('Подсказка:') ?>

    <?= $form->field($model, 'media')->FileInput(['id' => 'qMediaField', 'class' => 'col-lg-5'])->label('Файл:');   ?>



    <?/*= $form->field($model, 'media')->FileInput();   */?>

<!--    <?php /*if($model->image): */?>
        <img src="/images/avatars/<?/*= $model->image*/?>" alt="">
    --><?php /*endif; */?>

    <div class="form-group">
        <a href="<?=Yii::$app->urlManager->createUrl(['admin/redactors/question'])?>" class = "btn btn-primary">Назад</a>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>