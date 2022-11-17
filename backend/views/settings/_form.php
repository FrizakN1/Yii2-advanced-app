<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone_number')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'btn_text_home_page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'footer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_information_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'yandex_map_x')->textInput() ?>

    <?= $form->field($model, 'yandex_map_y')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
