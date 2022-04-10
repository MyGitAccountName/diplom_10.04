<?php
    $this->title = 'Администрирование';
?>

<div class="admin-default-index">
    <h1>Страница администратора</h1>

    <!--<a href="<?/*=Yii::$app->urlManager->createUrl(['admin/redactors/redactor', 'objectType' => 'question'])*/?>">Редактор вопросов</a>-->
    <p><a href="<?=Yii::$app->urlManager->createUrl(['admin/redactors/question'])?>">Редактор вопросов</a></p>
    <p><a href="<?=Yii::$app->urlManager->createUrl(['admin/redactors/redactor', 'objectType' => 'test'])?>">Редактор тестов</a></p>
    <p><a href="<?=Yii::$app->urlManager->createUrl(['admin/redactors/redactor', 'objectType' => 'book'])?>">Редактор учебников</a></p>

<!--    <a href="<?/*=Yii::$app->urlManager->createUrl(['admin/redactors/newquestion'])*/?>">Добавить вопрос</a>-->
</div>
