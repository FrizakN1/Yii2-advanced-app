<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $dataTag array */
/* @var $dataState array */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataTag' => $dataTag,
        'dataState' => $dataState,
    ]) ?>

</div>
