<?php
use yii\helpers\Html;
use dektrium\user\models\User;
use common\models\NewsTag;
?>
<?php $this->title = Yii::$app->params['page']['seo'][1]?>

<section class="section" id="blog">
    <div class="container mt-4 md-3">
        <h3 class="section-title mb-5"><?= Yii::$app->params['page']['title'][1]?></h3>
    </div>
<?php
        foreach ($news as $item) {
            switch (date('m', $item->created_at)) {
                case 1: $month = 'Янв'; break;
                case 2: $month = 'Фев'; break;
                case 3: $month = 'Мар'; break;
                case 4: $month = 'Апр'; break;
                case 5: $month = 'Мая'; break;
                case 6: $month = 'Июн'; break;
                case 7: $month = 'Июл'; break;
                case 8: $month = 'Авг'; break;
                case 9: $month = 'Сен'; break;
                case 10: $month = 'Окт'; break;
                case 11: $month = 'Ноя'; break;
                case 12: $month = 'Дек'; break;
                default: $month = ''; break;
            }
            $updated = '';
            if ($item->updated_at){
                $updated = '| <span><i class="ti-pencil"></i>(изменено '.date('d.m.y', $item->updated_at).')</span>';
            }
            $created = User::find()->where(['=', 'id', $item->created_by])->one()->username;
            $tags = NewsTag::find()->where(['=', 'news_id', $item->id])->all();
            echo '<a href="/news/view?id='.$item->id.'">
                    <div class="container mt-5 mb-3 blog-wrapper">
                    <div class="img-wrapper">'.
                Html::img('@web/img/'.$item->image, ['alt' => '...']).'
                        <div class="date-container">
                            <h6 class="day">'.date('d', $item->created_at).'</h6>
                            <h6 class="mun">'.$month .'</h6>
                        </div>
                    </div>
                     <div class="txt-wrapper">
                        <h4 class="blog-title">'.$item->title.'</h4>
                        <p class="dot-ellipsis" style="max-height:180px;">'.$item->text.'</p>';
                        foreach ($tags as $tag){
                            echo '<a href="#" class="badge badge-primary">'.$tag->tag->name.'</a> ';
                        }
                        echo '<h6 class="blog-footer">
                            <span><i class="ti-user"> </i>'.$created.'</span> |
                            <span><i class="ti-calendar"></i> '.date('d.m.y', $item->created_at).'</span>
                            '.$updated.'
                        </h6>
                    </div>
                    </div></a>';
        }
        ?>
</section>