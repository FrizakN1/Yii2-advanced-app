<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dektrium\user\models\User;
use common\models\State;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            'image',
            [
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->updated_at);
                }
            ],
            [
                'attribute' => 'created_by',
                'value' => function($model) {
                    return User::find()->where(['=', 'id', $model->created_by])->one()->username;
                }
            ],
            [
                'attribute' => 'state',
                'value' => function($model) {
                    return State::find()->where(['=', 'id', $model->state])->one()->name;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>


</div>
