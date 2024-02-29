<?php

namespace backend\controllers;

use Yii;
use backend\models\Tentang;
use backend\models\search\TentangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * TentangController implements the CRUD actions for Tentang model.
 */
class TentangController extends Controller
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
     * Lists all Tentang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TentangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexFrontend() {
        $this->layout = 'main-frontend';
        $searchModel = new TentangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-frontend', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tentang model.
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
     * Creates a new Tentang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tentang();

        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto');
            $path = 'foto/tentang/';
            FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
            $pathFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($path . $rand . '_tentang' . '.' . $foto->extension);
                $pathFoto = $path . $rand . '_tentang' . '.' . $foto->extension;
                $model->foto = $pathFoto;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Tentang Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Tentang Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tentang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelx = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto');
            if (!empty($foto)) {
                $path = 'foto/tentang/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFoto = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_video' . '.' . $foto->extension);
                    $pathFoto = $path . $rand . '_video' . '.' . $foto->extension;
                    $model->foto = $pathFoto;
                }
            } else {
                $model->foto = $modelx->foto;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Tentang Berhasil Diubah");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Tentang Gagal Diubah");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
        }
        

    /**
     * Deletes an existing Tentang model.
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
     * Finds the Tentang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tentang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tentang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
