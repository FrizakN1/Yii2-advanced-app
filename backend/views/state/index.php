<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статусы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-index">

    <p>
        <?= Html::a('Создать статус', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>


</div>
