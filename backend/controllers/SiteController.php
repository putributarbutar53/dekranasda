<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use common\models\User;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'index', 'daftar-anggota', 'verify-email', 'sedang-evaluasi', 'gagal-daftar'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'index-backend'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main-frontend';
        return $this->render('index-frontend');
    }
    public function actionIndexBackend() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/index-backend']);
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index-backend']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionDaftarAnggota() {
        $this->layout = 'main-frontend';
        $model = new \frontend\models\SignupForm();
        $modelPenjual = new \backend\models\Penjual();
        if ($model->load(Yii::$app->request->post()) && $modelPenjual->load(Yii::$app->request->post())) {
            $user = new \common\models\User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->setPassword($model->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();

            $foto = UploadedFile::getInstance($modelPenjual, 'foto');
            $pathFoto = 'foto/penjual/';
            FileHelper::createDirectory($pathFoto, $mode = 0777, $recursive = true);
            $pathFileFoto = '';
            if (isset($foto)) {
                $rand = rand();
                $foto->saveAs($pathFoto . $rand . '_penjual' . '.' . $foto->extension);
                $pathFileFoto = $pathFoto . $rand . '_penjual' . '.' . $foto->extension;
                $modelPenjual->foto = $pathFileFoto;
            }
            $modelPenjual->id_user = $user->id;
            if (!$modelPenjual->save()) {
                print_r($modelPenjual->getErrors());
                die;
            }

            $isi = 'Klik link ini untuk mengaktifkan akun anda: http://sites.local/fix/dekranasda/backend/web/index.php?r=site%2Fverify-email&token=' . $user->verification_token;
            $mail = Yii::$app->mailer->compose()
                    ->setFrom('dekranasda.tobakab@gmail.com')
                    ->setTo($user->email)
                    ->setSubject('Account registration at ' . Yii::$app->name)
                    ->setHtmlBody($isi);
            if ($mail->send()) {
                Yii::$app->session->setFlash('success', 'Yay! Pendaftaranmu sedang kami evaluasi');
            } else {
                Yii::$app->session->setFlash('danger', 'Failed.');
            }
            return $this->redirect(['site/sedang-evaluasi']);
        }

        return $this->render('signup', [
                    'model' => $model,
                    'modelPenjual' => $modelPenjual,
        ]);
    }

    public function actionSedangEvaluasi() {
        $this->layout = 'main-frontend';
        return $this->render('sedang-evaluasi');
    }

    public function actionGagalDaftar() {
        $this->layout = 'main-frontend';
        return $this->render('gagal-daftar');
    }

    private $_user;

    public function actionVerifyEmail($token) {
        try {
            $model = new \backend\models\VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        $user = User::find()->where(['verification_token' => $token])->one();
        $user->status = User::STATUS_ACTIVE;
        if ($user->save()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

}
