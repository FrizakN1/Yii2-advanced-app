<?php
use yii\helpers\Html;

/* @var $news common\models\News */

//$title = "{$news->title} - ".Yii::$app->name;
if(!$title = $news->seo->title) {
    $title = "Новость {$news->title} - FreshNews";
}

if(!$description = $news->seo->description) {
    $description = 'Новость '.$news->title;
}

if(!$keywords = $news->seo->keywords) {
    $keywords = '';
}

$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $keywords,
]);

?>
<?php $this->title = $title?>

<section class="section" id="blog">
    <div class="container mt-4 md-3">
        <h3 class="section-title mb-5"><?= $news->title?></h3>
    </div>
    <a href="#">
        <div class="container mt-5 mb-3">
            <div class="img-wrapper d-flex justify-content-center" style="margin-bottom:50px;border-bottom: 1px solid #dee2e6; padding-bottom: 50px">
                <?= Html::img('@web/img/'.$news->image, ['alt' => '...', 'style' => 'max-width:450px']) ?>
            </div>
            <div class="txt-wrapper">
                <p><?= $news->text?></p>
            </div>
        </div>
    </a>
</section>