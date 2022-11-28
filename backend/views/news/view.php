<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dektrium\user\models\User;
use common\models\State;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
