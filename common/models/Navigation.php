<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "navigation".
 *
 * @property int $id
 * @property string $name
 * @property string $title_tab
 * @property string|null $title_page
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title_tab'], 'required'],
            [['name', 'title_tab', 'title_page'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование в навигацонной панели',
            'title_tab' => 'Заголовок вкладки',
            'title_page' => 'Заголовок страницы',
        ];
    }
}
