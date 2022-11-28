<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\State */

$this->title = 'Изменение статуса: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="state-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
