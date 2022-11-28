<?php

namespace common\models;

use Yii;

/**
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $description
 */
class Settings extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'settings';
    }

    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key', 'description'], 'string', 'max' => 255],
            [['value'], 'string'],
            [['key'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Ключ',
            'value' => 'Значение',
            'description' => 'Описание',
        ];
    }
}
