<?php

namespace backend\controllers;

use Yii;
use backend\models\Penjual;
use backend\models\search\PenjualSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\models\User;
use yii\filters\AccessControl;

/**
 * PenjualController implements the CRUD actions for Penjual model.
 */
class PenjualController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['daftar-anggota'],
                'rules' => [
                        [
                        'actions' => ['daftar-anggota'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Penjual models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenjualSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexProses()
    {
        $searchModel = new PenjualSearch();
        $dataProvider = $searchModel->searchProses(Yii::$app->request->queryParams);

        return $this->render('index-sedang-diproses', [
                    'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexPenjual() {
        $this->layout = 'main-frontend';
        $searchModel = new PenjualSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-penjual', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerimaPenjual($id_user) {
        $user = User::findOne($id_user);
        $user->status = 10;
        if ($user->save(false)) {
            $response = Yii::$app->mailer->compose()
                    ->setFrom('dekranasda.tobakab@gmail.com')
                    ->setTo($user->email)
                    ->setSubject('Notifikasi Akun Telah Diterima')
//                    ->setTextBody('Plain text content')
                    ->setHtmlBody('<b>Selamat, permintaan pendaftaran akun anda telah kami terima. Silahkan Login ke <a href="dekranasda.tobakab.go.id/index.php?r=site%2Flogin">dekranasda.tobakab.go.id</a>.</b>')
                    ->send();
            if ($response == 1) {
                Yii::$app->session->setFlash('success', "Notifikasi Telah Dikirim ke Email " . $user->email);
                return $this->redirect(['index-proses']);
            } else {
                Yii::$app->session->setFlash('danger', "Notifikasi Gagal Dikirim ke Email " . $user->email);
                return $this->redirect(['index-proses']);
            }
        }
    }
    public function actionTolakPenjual($id_user) {
        $model = new Penjual();

        if ($model->load(Yii::$app->request->post())) {
            $alasanPenolakan = $model->alamat;
            $user = User::findOne($id_user);
            $user->status = 0;
            if ($user->save(false)) {
                $response = Yii::$app->mailer->compose()
                        ->setFrom('dekranasda.tobakab@gmail.com')
                        ->setTo($user->email)
                        ->setSubject('Notifikasi Akun Telah Ditolak')
//                    ->setTextBody('Plain text content')
                        ->setHtmlBody('<b>Permohonan registrasi akun anda ditolak dengan alasan:<br></b>' . $alasanPenolakan)
                        ->send();
                if ($response == 1) {
                    Yii::$app->session->setFlash('success', "Notifikasi Telah Dikirim ke Email " . $user->email);
                    return $this->redirect(['index-proses']);
                } else {
                    Yii::$app->session->setFlash('danger', "Notifikasi Gagal Dikirim ke Email " . $user->email);
                    return $this->redirect(['index-proses']);
                }
            }
        }

        return $this->renderAjax('_formAlasanTolak', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays a single Penjual model.
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

    public function actionDetailPenjual($id) {
        $this->layout = 'main-frontend';
        return $this->render('detail-penjual', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Penjual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penjual();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Penjual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Penjual model.
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
     * Finds the Penjual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penjual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penjual::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    

    public function actionLists($id) {
        $countDesas = \backend\models\MasterDesKel::find()->where(['id_kecamatan' => $id])->count();

        $desas = \backend\models\MasterDesKel::find()->where(['id_kecamatan' => $id])->orderBy('id DESC')->all();

        if ($countDesas > 0) {
            echo "<option value=''disabled selected></option>";
            foreach ($desas as $desa) {
                echo "<option value='" . $desa->id . "'>" . $desa->nama . "</option>";
            }
        } else {
            echo "<option value='-'>Tidak Ada Data</option>";
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubCatList($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    

}
