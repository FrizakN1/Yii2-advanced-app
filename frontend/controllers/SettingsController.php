<?php

namespace frontend\controllers;

use common\models\Page;
use yii\web\Controller;
use common\models\Settings;
use Yii;

class SettingsController extends Controller
{
    public function getSettings() {
        $settings = Settings::find()->all();

        foreach ($settings as $item) {

            switch ($item->key) {
                case 'phoneNumber':
                    $phoneNumber = str_split($item->value);
                    $item->value = '+7';
                    switch (count($phoneNumber)) {
                        case 11:
                            $item->value = $item->value . ' (';
                            for ($i = 1; $i < 11; $i++) {
                                switch ($i) {
                                    case 3:
                                        $item->value = $item->value . $phoneNumber[$i] . ') ';
                                        break;
                                    case 6:
                                        $item->value = $item->value . $phoneNumber[$i] . '-';
                                        break;
                                    default:
                                        $item->value = $item->value . $phoneNumber[$i];
                                        break;
                                }
                            }
                            break;
                        case 12:
                            $item->value = $item->value . ' (';
                            for ($i = 1; $i < 12; $i++) {
                                switch ($i) {
                                    case 4:
                                        $item->value = $item->value . $phoneNumber[$i] . ') ';
                                        break;
                                    case 7:
                                        $item->value = $item->value . $phoneNumber[$i] . '-';
                                        break;
                                    default:
                                        $item->value = $item->value . $phoneNumber[$i];
                                        break;
                                }
                            }
                            break;
                        default:
                            for ($i = 1; $i < count($phoneNumber); $i++) {
                                $item->value = $item->value . $phoneNumber[$i];
                            }
                            break;
                    }
                    Yii::$app->params['settings']['phoneNumber'] = $item->value;
                    break;
                case 'email': Yii::$app->params['settings']['email'] = $item->value; break;
                case 'address': Yii::$app->params['settings']['address'] = $item->value; break;
                case 'btnTextHomePage': Yii::$app->params['settings']['btnTextHomePage'] = $item->value; break;
                case 'contactInformationText': Yii::$app->params['settings']['contactInformationText'] = $item->value; break;
                case 'projectDescription': Yii::$app->params['settings']['projectDescription'] = $item->value; break;
                case 'footer': Yii::$app->params['settings']['footer'] = $item->value; break;
                case 'YandexMapX': Yii::$app->params['settings']['YandexMapX'] = $item->value; break;
                case 'YandexMapY': Yii::$app->params['settings']['YandexMapY'] = $item->value; break;
                default: break;
            }

        }

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