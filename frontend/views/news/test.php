<?php
use yii\helpers\Html;
use dektrium\user\models\User;
use common\models\News_tag;
?>
<?php $this->title = Yii::$app->params['page']['seo'][1]?>

<section class="section" id="blog">
    <div class="container mt-4 md-3">
        <h3 class="section-title mb-5"><?= Yii::$app->params['page']['title'][1]?></h3>
    </div>
    <?php
        for ($i=0; $i < 10; $i++) {
            $faker = \Faker\Factory::create('ru_RU');
            echo '<a href="#">
                    <div class="container mt-5 mb-3 blog-wrapper">
                    <div class="img-wrapper">'.
                Html::img($faker->imageUrl(1920, 1080, 'animals', true), ['alt' => '...']).'
                        <div class="date-container">
                            <h6 class="day">'.$faker->dateTimeThisCentury()->format('d').'</h6>
                            <h6 class="mun">'.$faker->dateTimeThisCentury()->format('M') .'</h6>
                        </div>
                    </div>
                     <div class="txt-wrapper">
                        <h4 class="blog-title">'.$faker->words(3, true).'</h4>
                        <p class="dot-ellipsis" style="max-height:180px;">'.$faker->text().'</p>
                        <h6 class="blog-footer">
                            <span><i class="ti-user"> </i>'.$faker->name().'</span> |
                            <span><i class="ti-calendar"></i> '.$faker->dateTimeThisCentury()->format('d.m.Y').'</span>
                        </h6>
                    </div>
                    </div></a>';
        }
    ?>

</section>