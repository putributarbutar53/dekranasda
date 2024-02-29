<?php

namespace backend\controllers;

use Yii;
use backend\models\Video;
use backend\models\search\VideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
{
    /**
     * {@inheritdoc}
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
    public function actionIndexVideo() {
        $this->layout = 'main-frontend';
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-video', [
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
        $model = new Video();

        if ($model->load(Yii::$app->request->post())) {
            $model->jumlah_view = 0;
            $foto = UploadedFile::getInstance($model, 'foto_thumbnail');
            $path = 'foto/video/thumbnail/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($path . $rand . '_video' . '.' . $foto->extension);
                $pathFoto = $path . $rand . '_video' . '.' . $foto->extension;
                $model->foto_thumbnail = $pathFoto;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Video Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Video Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
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
        $model = $this->findModel($id);
        $modelx = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto_thumbnail');
            if (!empty($foto)) {
                $path = 'foto/video/thumbnail/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_video' . '.' . $foto->extension);
                    $pathFoto = $path . $rand . '_video' . '.' . $foto->extension;
                    $model->foto_thumbnail = $pathFoto;
                }
            } else {
                $model->foto_thumbnail = $modelx->foto_thumbnail;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Video Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Video Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
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

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
