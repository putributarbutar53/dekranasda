<?php

namespace backend\controllers;

use Yii;
use backend\models\ArtiLambang;
use backend\models\search\ArtiLambangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ArtiLambangController implements the CRUD actions for ArtiLambang model.
 */
class ArtiLambangController extends Controller
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
     * Lists all ArtiLambang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtiLambangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexFrontend() {
        $this->layout = 'main-frontend';
        $searchModel = new ArtiLambangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-frontend', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtiLambang model.
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
     * Creates a new ArtiLambang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtiLambang();

        if ($model->load(Yii::$app->request->post())) {
            //foto ArtiLambang
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/arti_lambang/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_arti_lambang' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_arti_lambang' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            //end foto ArtiLambang
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Arti Lambang Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Arti Lambang Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArtiLambang model.
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
                $path = 'foto/arti_lambang/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_arti_lambang' . '.' . $foto->extension);
                    $pathFoto = $path . $rand . '_arti_lambang' . '.' . $foto->extension;
                    $model->foto = $pathFoto;
                }
            } else {
                $model->foto = $modelx->foto;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Arti Lambang Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Arti Lambang Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArtiLambang model.
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
     * Finds the ArtiLambang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArtiLambang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArtiLambang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
