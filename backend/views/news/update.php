<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $dataTag array */
/* @var $dataState array */

$this->title = 'Изменение новости: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="news-update">

    <?= $this->render('_form', [
        'model' => $model,
        'dataTag' => $dataTag,
        'dataState' => $dataState,
    ]) ?>

</div>
