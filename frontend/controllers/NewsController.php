<?php

namespace frontend\controllers;

use common\models\News;

class NewsController extends SettingsController
{

    public function actions()
    {
        $this->getSettings();
        return parent::actions();
    }

    public function actionIndex() {
        $news = News::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', ['news' => $news]);
    }

    public function actionView($id) {
        $news = News::find()->where(['=', 'id', $id])->one();

        return $this->render('view', ['news' => $news]);
    }

    public function actionTest() {
        return $this->render('test');
    }
}