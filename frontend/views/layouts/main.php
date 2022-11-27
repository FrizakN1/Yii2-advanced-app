<?php

use common\models\Page;
use common\models\Settings;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

if (!Yii::$app->params['settings'] || !Yii::$app->params['page']) {
    //$settings = Settings::find()->one();
    //Yii::$app->params['settings']['footer'] = $settings->footer;

    $page = Page::find()->asArray()->all();
    Yii::$app->params['page']['title'] = array();
    Yii::$app->params['page']['url'] = array();
    Yii::$app->params['page']['seo'] = array();
    foreach ($page as $item) {
        array_push(Yii::$app->params['page']['title'], $item['title']);
        array_push(Yii::$app->params['page']['url'], $item['url']);
        array_push(Yii::$app->params['page']['seo'], $item['seo']);
    }
}
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
    <?php $this->registerLinkTag([
        'rel' => 'shortcut icon',
        'type' => 'image/x-icon',
        'href' => Url::to('@web/img/brand.svg'),
    ]);?>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/brand.svg', ['class' => 'brand-img']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top border-bottom',
            'id' => "scrollspy",
            'data-spy' => 'affix',
            'data-offset-top' => '20'
        ],
    ]);
    $menuItems = [
        ['label' => Yii::$app->params['page']['title'][1], 'url' => [Yii::$app->params['page']['url'][1]]],
        ['label' => Yii::$app->params['page']['title'][2], 'url' => [Yii::$app->params['page']['url'][2]]],
        ['label' => Yii::$app->params['page']['title'][3], 'url' => [Yii::$app->params['page']['url'][3]]],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = '<li class="nav-item">'.Html::a('Регистрация', '/user/registration/register', ['class' => 'btn btn-primary ml-1 btn-sm mt-1']).'</li>';
        $menuItems[] = '<li class="nav-item">'.Html::a('Вход', '/user/security/login', ['class' => 'btn btn-primary ml-1 btn-sm mt-1']).'</li>';
    } else {
        $menuItems[] = '<li class="nav-item">'.Html::a(Yii::$app->user->identity->username, '/user/settings/account', ['class' => 'btn btn-primary ml-1 btn-sm mt-1']).'</li>';
        $menuItems[] = '<li class="nav-item">'
            . Html::beginForm(['/user/security/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                    'Выйти',
                ['class' => 'btn btn-primary btn-sm mt-1 ml-1']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<?= $content ?>

<div class="container mt-auto">
    <footer class="footer border-top row align-items-center justify-content-center">
        <p class="mb-0"><?= Yii::$app->params['settings']['footer']?></p>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
