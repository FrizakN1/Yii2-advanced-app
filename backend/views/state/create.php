<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\State */

$this->title = 'Создание статуса';
$this->params['breadcrumbs'][] = ['label' => 'Статусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
