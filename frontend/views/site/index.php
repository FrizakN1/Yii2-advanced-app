<?php

/** @var yii\web\View $this */
use yii\helpers\Html;

$this->title = Yii::$app->params['page']['seo'][0];
?>
<section id="home" class="header">
    <div class="overlay"></div>

    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="container carousel-inner carousel-caption">
            <h1 class="carousel-title"><?= Yii::$app->params['page']['seo'][0]?></h1>
            <?= Html::a(Yii::$app->params['settings']['btnTextHomePage'], '/news', ['class' => 'btn btn-primary btn-rounded']) ?>
        </div>
    </div>

    <div class="infos container mb-4 mb-md-2">
        <div class="socials text-right">
            <div class="row justify-content-between">
                <div class="col">
                    <div class="d-block subtitle"><i class="ti-microphone pr-2"></i> <?= Yii::$app->params['settings']['phoneNumber']?></div>
                    <div class="d-block subtitle"><i class="ti-email pr-2"></i> <?= Yii::$app->params['settings']['email']?></div>
                </div>
            </div>
        </div>
    </div>
</section>