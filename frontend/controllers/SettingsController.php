<?php

namespace frontend\controllers;

use common\models\Page;
use yii\web\Controller;
use common\models\Settings;
use common\models\Navigation;
use Yii;

class SettingsController extends Controller
{
    public function getSettings() {
        $settings = Settings::find()->one();
        $phoneNumber = str_split($settings->phone_number);
        $settings->phone_number = '+7';
        switch (count($phoneNumber)) {
            case 11:
                $settings->phone_number = $settings->phone_number . ' (';
                for ($i = 1; $i < 11; $i++) {
                    switch ($i) {
                        case 3:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i] . ') ';
                            break;
                        case 6:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i] . '-';
                            break;
                        default:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i];
                            break;
                    }
                }
                break;
            case 12:
                $settings->phone_number = $settings->phone_number . ' (';
                for ($i = 1; $i < 12; $i++) {
                    switch ($i) {
                        case 4:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i] . ') ';
                            break;
                        case 7:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i] . '-';
                            break;
                        default:
                            $settings->phone_number = $settings->phone_number . $phoneNumber[$i];
                            break;
                    }
                }
                break;
            default:
                for ($i = 1; $i < count($phoneNumber); $i++) {
                    $settings->phone_number = $settings->phone_number . $phoneNumber[$i];
                }
                break;
        }
        Yii::$app->params['settings']['phoneNumber'] = $settings->phone_number;
        Yii::$app->params['settings']['email'] = $settings->email;
        Yii::$app->params['settings']['address'] = $settings->address;
        Yii::$app->params['settings']['btnTextHomePage'] = $settings->btn_text_home_page;
        Yii::$app->params['settings']['contactInformationText'] = $settings->contact_information_text;
        Yii::$app->params['settings']['projectDescription'] = $settings->project_description;
        Yii::$app->params['settings']['footer'] = $settings->footer;
        Yii::$app->params['settings']['YandexMapX'] = $settings->yandex_map_x;
        Yii::$app->params['settings']['YandexMapY'] = $settings->yandex_map_y;

        $page = Page::find()->asArray()->all();

        Yii::$app->params['page']['title'] = array();
        Yii::$app->params['page']['url'] = array();
        Yii::$app->params['page']['seo'] = array();
        foreach ($page as $item) {
            array_push(Yii::$app->params['page']['title'], $item['title']);
            array_push(Yii::$app->params['page']['url'], $item['url']);
            array_push(Yii::$app->params['page']['seo'], $item['seo']);
        }
    }
}