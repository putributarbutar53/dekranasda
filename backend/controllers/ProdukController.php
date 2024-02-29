<?php

namespace backend\controllers;

use Yii;
use backend\models\Produk;
use backend\models\search\ProdukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
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
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexProduk() {
        $this->layout = 'main-frontend';
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-produk', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Displays a single Produk model.
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

    public function actionDetailProduk($id) {
        $this->layout = 'main-frontend';
        return $this->render('detail-produk', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produk();

        if ($model->load(Yii::$app->request->post())) {
            $foto = UploadedFile::getInstance($model, 'foto');
            $pathFoto = 'foto/produk/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_produk' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_produk' . '.' . $foto->extension;
                $model->foto = $pathFileFoto;
            }
            $penjual = \backend\models\Penjual::find()
                    ->where(['id_user' => \Yii::$app->user->identity->id])
                    ->one();
            $model->id_penjual = $penjual->id;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Produk Berhasil Disimpan");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Produk Gagal Disimpan");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produk model.
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
                $path = 'foto/produk/';
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $pathFile = '';
                if (isset($foto)) {
                    $rand = rand();
                    $foto->saveAs($path . $rand . '_produk' . '.' . $foto->extension);
                    $pathFile = $path . $rand . '_produk' . '.' . $foto->extension;
                    $model->foto = $pathFile;
                }
            } else {
                $model->foto = $modelx->foto;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Produk Berhasil Di Update");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Produk Gagal Di Update");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produk model.
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
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
