<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$this->registerCssFile("css/menu.css");

$session = Yii::$app->session;
if (!$session->isActive) { $session->open(); }



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header style="background: linear-gradient(to bottom, #ff610c 25%, #ffa73c 75%, #ffbd5b)"  class="d-flex flex-column justify-content-between">
    <!--<div class="d-flex flex-column justify-content-between">--> <!--style="width: 1110px; margin: 0 auto;"-->
        <div class="topHead d-flex justify-content-between align-items: stretch">
            <div class="toHomePage d-flex justify-content-left">
                <a href="<?= Yii::$app->homeUrl ?>" class="logo d-flex flex-column justify-content-center">
                    <img class="main-ico" src="../pic/ico.png" height="90" alt="Ico">
                </a>
                <a href="<?= Yii::$app->homeUrl ?>" class="title d-flex flex-column justify-content-between"> <!--text-decoration-none text-reset-->
                    <span class="siteDescription">Образовательный портал</span>
                    <span class="siteName">НЕ ТУПИ</span>
                </a>
            </div>

            <?php echo (Yii::$app->user->isGuest ? "<a class='profile d-flex flex-column justify-content-center align-items-center' href='".Yii::$app->homeUrl."?r=site%2Flogin'>Войти</a>"

                : (
                    '<div id="profile" class = "profile d-flex flex-column justify-content-between align-items-center">'
              //  ."{if($model->image):}"
               // .'<img src="./images/avatars/'.Yii::$app->user->getId().'.jpg" alt="" id="avatar">'

                    .'<img src="./images/avatars/'.Yii::$app->session->get("avatar").'" alt="" id="avatar">'
             //   ."{endif;}"
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        .'<a href="'.Yii::$app->urlManager->createUrl(['site/profile', 'login' => Yii::$app->user->identity->login]).'">'.Yii::$app->user->identity->login.'</a>'
                    . Html::submitButton(
                        '',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</div>'
                ));
            ?>
        </div>
    <!--</div>-->

        <?php
            NavBar::begin([
                /*'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,*/
                'options' => [
                    'class' => 'navbar navbar-expand-sm main-menu navbar-dark',
                    'id' => 'mainMenu',
                    //'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
                ],
            ]);

            $a = Yii::$app->user->identity->role;
            if ($a === 2) {$name = 'Редакторы'; $url = '/admin/default/index'; }
            else {$name = 'Контакты'; $url = '/site/contact'; }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'О проекте', 'url' => ['/site/about']],
                    ['label' => 'Тесты', 'url' => ['/site/tests']],
                    ['label' => 'Учебники', 'url' => ['/site/guide']],
                    ['label' => 'Отзывы', 'url' => ['/site/comment']],
                   // ['label' => 'Редакторы', 'url' => ['/admin/redactor/question']],
                    ['label' => $name, 'url' => [$url]],
                    /*Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )*/
                ],
            ]);
            NavBar::end();
        ?>


        <a href="#" class="mobile_menu">Предметы</a>


</header>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
<!--        --><?/*= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */?>


        <div class="mobile_menu_container">
            <div class="mobile_menu_content">
                <ul>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Русский язык', 'subjectKey' => 1])?>">Русский&nbsp;язык</a></li>
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
            </div>
        </div>
        <div class="mobile_menu_overlay"></div>


        <aside id = "subjectList">
            <ul>
                <li><a href="<?=Yii::$app->urlManager->createUrl(['site/subject', 'subjectName' => 'Русский язык', 'subjectKey' => 1])?>">Русский&nbsp;язык</a></li>
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
        <?/*= Alert::widget() */?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
   <!-- <footer class="footer mt-auto py-3 text-muted fixed-bottom"> -->
    <div class="d-flex justify-content-between container align-items-center">
        <p>&copy; My Company <?= date('Y') ?></p>
        <p><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
