<?php

namespace backend\controllers;

use Yii;
use backend\models\Kegiatan;
use backend\models\search\KegiatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * KegiatanController implements the CRUD actions for Kegiatan model.
 */
class KegiatanController extends Controller
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
     * Lists all Kegiatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KegiatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexKegiatan() {
        $this->layout = 'main-frontend';
        $searchModel = new KegiatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-kegiatan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kegiatan model.
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

    public function actionViewKegiatan($id) {
        $this->layout = 'main-frontend';
        return $this->render('view-kegiatan', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kegiatan();

        if ($model->load(Yii::$app->request->post())) {
            //foto Kegiatan
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/kegiatan/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_kegiatan' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_kegiatan' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            //end foto Kegiatan
            //file Kegiatan
            $file = UploadedFile::getInstance($model, 'file');
            $path = 'file/kegiatan/';
            FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
            $pathFile = '';
            if (isset($file)) {
                $rand = rand();
                $file->saveAs($path . $rand . '_kegiatan' . '.' . $file->extension);
                $pathFile = $path . $rand . '_kegiatan' . '.' . $file->extension;
                $model->file = $pathFile;
            }
            //end file Kegiatan

            $model->jumlah_view = 0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Kegiatan Berhasil Ditambah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Kegiatan Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kegiatan model.
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
            $foto = UploadedFile::getInstance($model, 'foto');
            if (!empty($foto)) {
                $path = 'foto/kegiatan/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFile = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_kegiatan' . '.' . $foto->extension);
                    $pathFile = $path . $rand . '_kegiatan' . '.' . $foto->extension;
                    $model->foto = $pathFile;
                }
            } else {
                $model->foto = $modelx->foto;
            }
            $file = UploadedFile::getInstance($model, 'file');
            if (!empty($file)) {
                $path = 'foto/kegiatan/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFile = '';
                if (isset($file)) {
                    $rand = rand();
                    $file->saveAs($path . $rand . '_kegiatan' . '.' . $file->extension);
                    $pathFile = $path . $rand . '_kegiatan' . '.' . $file->extension;
                    $model->file = $pathFile;
                }
            } else {
                $model->file = $modelx->file;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Kegiatan Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Kegiatan Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kegiatan model.
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
     * Finds the Kegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kegiatan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
