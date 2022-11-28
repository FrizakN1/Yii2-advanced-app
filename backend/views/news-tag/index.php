<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-tag-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'news_id',
            'tag_id',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>


</div>
