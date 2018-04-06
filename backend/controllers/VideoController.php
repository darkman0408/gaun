<?php

namespace backend\controllers;

use Yii;
use common\models\Video;
use common\models\VideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Embed\Embed;
use common\models\VideoProperty;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /* $model = new Video();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]); */

        $video = new Video();
        $property = new VideoProperty();

        if ($video->load(Yii::$app->request->post())) 
        {
            $isValid = $video->validate();
            $isValid = $property->validate() && $isValid;
            if($isValid)
            {
                $video->save();
                $property->videoId = $video->id;

                $info = Embed::create($video->video);

                $property->title = $info->title;
                $property->image = $info->image;
                $property->imageWidth = $info->imageWidth;
                $property->imageHeight = $info->imageHeight;
                $property->code = $info->code;
                $property->width = $info->width;
                $property->height = $info->height;
                $property->providerName = $info->providerName;

                $property->save();
                return $this->redirect(['create']);
            }

        }

        return $this->render('create', [
            'video' => $video,
        ]);
    }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $video = Video::findOne($id);

        $property = VideoProperty::findOne($video->id);

        /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } */

        if ($video->load(Yii::$app->request->post()))
        {
            $isValid = $video->validate();
            $isValid = $property->validate() && $isValid;
            if($isValid)
            {
                $video->save();
                $info = Embed::create($video->video);
                $property->title = $info->title;
                $property->image = $info->image;
                $property->imageWidth = $info->imageWidth;
                $property->imageHeight = $info->imageHeight;
                $property->code = $info->code;
                $property->width = $info->width;
                $property->height = $info->height;
                $property->providerName = $info->providerName;

                $property->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'video' => $video,
            'property' => $property,
        ]);
    }

    /**
     * Deletes an existing Video model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
