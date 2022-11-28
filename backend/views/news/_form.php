<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataTag array */
/* @var $dataState array */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->widget(Select2::classname(), [
        'data' => $dataState,
        'options' => ['placeholder' => 'Выберите статус...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="news_form">
        <div class="left_side">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <img src="" alt="" id="preview" height="200px">

            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'language' => 'ru',
                'options' => ['accept' => 'image/*'],
            ]); ?>

            <?= $form->field($model, 'tagsList')->widget(Select2::classname(), [
                'data' => $dataTag,
                'options' => [
                    'placeholder' => 'Выберите теги...',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>

            <?=\dvizh\seo\widgets\SeoForm::widget([
                'model' => $model,
                'form' => $form,
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <div class="right_side">
            <?= $form->field($model, 'text')->textarea(['rows' => 20]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


