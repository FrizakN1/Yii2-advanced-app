<?php

namespace frontend\controllers;

use frontend\models\ContactForm;
use Yii;

class ContactController extends SettingsController
{
    public function actions() {
        $this->getSettings();
        return parent::actions();
    }

    public function actionIndex() {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Yii::$app->params['senderEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            $map = new \mirocow\yandexmaps\Map('yandex_map', [
                'center' => [Yii::$app->params['settings']['YandexMapY'], Yii::$app->params['settings']['YandexMapX']],
                'zoom' => 16,
                'behaviors' => array('default', 'scrollZoom'),
                'type' => "yandex#map",
                'controls' => [],
            ],
                [
                    // Permit zoom only fro 9 to 11
                    'minZoom' => 13,
                    'maxZoom' => 17,
                    'controls' => [
                        //"new ymaps.control.SmallZoomControl()",
                        //"new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite'])",
                        'new ymaps.control.ZoomControl({options: {size: "small"}})',
                        //'new ymaps.control.TrafficControl({options: {size: "small"}})',
                        //'new ymaps.control.GeolocationControl({options: {size: "small"}})',
                        //'search' => 'new ymaps.control.SearchControl({options: {size: "small"}})',
                        //'new ymaps.control.FullscreenControl({options: {size: "small"}})',
                        //'new ymaps.control.RouteEditor({options: {size: "small"}})',
                    ],
                    'objects' => [<<<JS
let placemark = new ymaps.Placemark([55.437087, 65.331758], {}, {
    iconLayout: 'default#image',
    iconImageHref: '/img/placemarker.svg',
    iconImageSize: [35,35],
    iconImageOffset: [-16,-35]
});
\$Maps['yandex_map'].geoObjects.add(placemark)
JS]
                ]);
            return $this->render('index', ['map' => $map, 'model' => $model]);
        }
    }
}