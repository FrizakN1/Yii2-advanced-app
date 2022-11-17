<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
/* @var $tags common\models\Tag */
?>

<div class="news-form">

    <?php
        $tagsID = '';
        if ($model->id){
            foreach ($model->news_tags as $tagID){
                $tagsID = $tagsID.$tagID->tag_id.', ';
            }
        }
    ?>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'news_form']]); ?>

    <div class="left_side">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <img src="" alt="" id="preview" height="200px">

        <?= $form->field($model, 'image')->fileInput() ?>

        <?= $form->field($model, 'tagsList')->hiddenInput(['value' => $tagsID])->label(false) ?>

        <div class="btn_tags">Добавить теги</div>

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

    <div class="tags_window_main">
        <div class="tags_window">
            <div class="tags_close"></div>
            <input type="text" placeholder="Поиск тега" id="search">
            <div class="choose_tags">
            </div>
            <div class="tags_list">
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        let tags = <?= json_encode($tags); ?>
    </script>
</div>

<?php $this->registerJsFile("@web/js/tags_window.js", ['depends' => 'yii\web\YiiAsset'])?>
<?php $this->registerJsFile("@web/js/preview_img.js", ['depends' => 'yii\web\YiiAsset'])?>
