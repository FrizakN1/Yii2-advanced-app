<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int $phone_number
 * @property string $email
 * @property string $address
 * @property string $btn_text_home_page
 * @property string $footer
 * @property string $contact_information_text
 * @property string $project_description
 * @property float $yandex_map_x
 * @property float $yandex_map_y
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'email', 'address', 'btn_text_home_page', 'footer', 'contact_information_text', 'project_description', 'yandex_map_x', 'yandex_map_y'], 'required'],
            [['phone_number'], 'integer'],
            [['contact_information_text', 'project_description'], 'string'],
            [['yandex_map_x', 'yandex_map_y'], 'number'],
            [['email', 'address', 'btn_text_home_page', 'footer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => 'Номер телефона',
            'email' => 'Email',
            'address' => 'Адрес',
            'btn_text_home_page' => 'Кнопка на главной странице',
            'footer' => 'Подвал',
            'contact_information_text' => 'Текст контактной ифнормации',
            'project_description' => 'Описание проекта',
            'yandex_map_x' => 'Yandex Map X',
            'yandex_map_y' => 'Yandex Map Y',
        ];
    }
}
