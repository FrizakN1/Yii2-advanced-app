<?php

namespace backend\controllers;

use common\models\News;
use common\models\News_tag;
use common\models\NewsSearch;
use common\models\Tag;
use common\Models\TagSearch;
use dektrium\user\filters\AccessRule;
use dektrium\user\models\Profile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use common\models\News_tagSearch;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
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
        $tags = Tag::find()->asArray()->all();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->saveImage($model);
            if ($model->tagsList){
                $model->tagsList = explode(",", $model->tagsList);
                foreach ($model->tagsList as $item) {
                    if ($item != 0){
                        $newsTag = new News_tag();
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
            'tags' => $tags,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tags = Tag::find()->asArray()->all();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->saveImage($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'tags' => $tags,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::getAlias('@frontend')."/web/img/{$model->image}");
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
