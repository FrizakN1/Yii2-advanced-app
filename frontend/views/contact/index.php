<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = Yii::$app->params['page']['seo'][2];

?>
<section id="contact" class="section pb-0">
    <div class="container mt-4">
        <h3 class="section-title mb-4"><?= Yii::$app->params['page']['title'][2]?></h3>

        <div class="container mb-5">
            <?php
            echo \mirocow\yandexmaps\Canvas::widget([
                'htmlOptions' => [
                    'style' => 'height: 400px',
                ],
                'map' => $map,
            ]);
            ?>
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col-md-8 col-lg-7">

                <?php $form = ActiveForm::begin(['options' => ['class' => 'contact-form']]); ?>
                <div class="form-row">
                    <div class="col form-group">
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Имя'])->label(false) ?>
                    </div>
                    <div class="col form-group">
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email'])->label(false) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'cols' => 30,'class' => 'form-control', 'placeholder' => 'Ваше сообщение'])->label(false) ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-4 d-none d-md-block order-1">
                <ul class="list">
                    <li class="list-head">
                        <h6>КОНТАКТНАЯ ИНФОРМАЦИЯ</h6>
                    </li>
                    <li class="list-body">
                        <p class="py-2"><?= Yii::$app->params['settings']['contactInformationText']?></p>
                        <p class="py-2"><i class="ti-location-pin"></i> <?= Yii::$app->params['settings']['address']?></p>
                        <p class="py-2"><i class="ti-email"></i>  <?= Yii::$app->params['settings']['email']?></p>
                        <p class="py-2"><i class="ti-microphone"></i> <?= Yii::$app->params['settings']['phoneNumber'] ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>