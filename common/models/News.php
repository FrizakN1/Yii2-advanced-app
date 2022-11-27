<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class News extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        $created_by = null;
        if (!Yii::$app->user->isGuest){
            $created_by = Yii::$app->user->identity->id;
        }
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => time()
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,
                'value' => $created_by
            ],
            'seo' => [
                'class' => 'dvizh\seo\behaviors\SeoFields',
            ],
        ];
    }

    public static function tableName()
    {
        return 'news';
    }
    public $tagsList;
    public function rules()
    {
        return [
            [['title', 'text', 'image', 'created_at', 'created_by', 'state'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'state'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['tagsList'], 'default']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст новости',
            'image' => 'Изображение',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'created_by' => 'Создано',
            'state' => 'Статус'
        ];
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getNewsTags()
    {
        return $this->hasMany(NewsTag::className(), ['news_id' => 'id']);
    }

    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state']);
    }

    public function saveImage($model){
        $model->image = UploadedFile::getInstance($model, 'image');
        $fileName = $model->image->baseName.Yii::$app->getSecurity()->generateRandomString(10);
        $model->image->saveAs(Yii::getAlias('@frontend')."/web/img/".$fileName.".{$model->image->extension}");
        $model->image =  $fileName.".{$model->image->extension}";
        $model->save(false);
    }
}
