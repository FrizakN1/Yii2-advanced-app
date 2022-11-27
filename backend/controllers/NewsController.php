<?php

namespace backend\controllers;

use common\models\News;
use common\models\NewsSearch;
use common\models\State;
use common\models\Tag;
use common\models\NewsTag;
use common\models\NewsTagSearch;
use dektrium\user\filters\AccessRule;
use dektrium\user\models\Profile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;


class NewsController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'ruleConfig' => [
                        'class' => AccessRule::className(),
                    ],
                    'rules' => [
                        [
                            'actions' => ['login', 'error', 'logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['index', 'create', 'update', 'delete', 'view'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actions()
    {
        if (!Yii::$app->user->isGuest){
            Yii::$app->params['profile'] = Profile::find()->where(['=', 'user_id', Yii::$app->user->identity->id])->one();
        }

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new News();
        $tags = Tag::find()->all();
        $states = State::find()->all();
        $dataTag = [];
        $dataState = [];

        foreach ($tags as $tag) {
            $dataTag[$tag->id] = $tag->name;
        }

        foreach ($states as $state) {
            $dataState[$state->id] = $state->name;
        }

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->saveImage($model);

            if ($model->tagsList){
                foreach ($model->tagsList as $item) {
                    if ($item != 0){
                        $newsTag = new NewsTag();
                        $newsTag->news_id = $model->id;
                        $newsTag->tag_id = $item;
                        $newsTag->save(false);
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'dataTag' => $dataTag,
            'dataState' => $dataState,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tags = Tag::find()->all();
        $states = State::find()->all();
        $dataTag = [];
        $dataState = [];

        foreach ($tags as $tag) {
            $dataTag[$tag->id] = $tag->name;
        }

        foreach ($states as $state) {
            $dataState[$state->id] = $state->name;
        }

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->saveImage($model);

            if ($model->tagsList){
                foreach ($model->tagsList as $item) {
                    if ($item != 0){
                        $newsTag = new NewsTag();
                        $newsTag->news_id = $model->id;
                        $newsTag->tag_id = $item;
                        $newsTag->save(false);
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'dataTag' => $dataTag,
            'dataState' => $dataState,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::getAlias('@frontend')."/web/img/{$model->image}");
        $model->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
