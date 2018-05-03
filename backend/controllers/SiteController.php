<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\SignUpForm;
use common\models\User;
use backend\models\Siswa;
use backend\models\SignUpguruForm;
use backend\models\SignUpgurunextForm;
use backend\models\SignUpsiswaForm;
use backend\models\SignUpsiswanextForm;
use backend\models\Guru;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','signup-guru','sign-up-guru-next','signup-siswa','sign-up-siswa-next' ],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @inheritdoc
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
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
  
  public function actionSignupGuru()
    {
        $model = new SignUpguruForm();
         $tabel = new Guru();
        if ($model->load(Yii::$app->request->post())) {
                $tabel->nama_guru = $model->nama_guru;
                $tabel->tgl_lahir= $model->tgl_lahir;
                $tabel->sekolah = $model->sekolah;
                $tabel->nama_matpel = $model->nama_matpel;
                $tabel->save();

        
           return $this->redirect(['sign-up-guru-next','id'=>$tabel->id_guru]);

        }
        else{
            return $this->render('signupguru',[
                'model' => $model,
            ]);
        }
    }

    public function actionSignUpGuruNext($id)
    {

        $guru= Guru::find()->where(['id_guru'=>$id])->one();
        $model = new SignUpgurunextForm();
        if($model->load(Yii::$app->request->post())){
                $model->guru_id=$guru->id_guru;
                $model->signup();
                return $this->redirect(['login']);
        }
        else{
            $model->firstname= $guru->nama_guru;
            return $this->render('signupgurunext',[
                'model' => $model,
            ]);
            }
        }

         public function actionSignupSiswa()
    {
        $model = new SignUpsiswaForm();
         $tabel = new Siswa();
        if ($model->load(Yii::$app->request->post())) {
                $tabel->nama_lengkap = $model->nama_lengkap;
                $tabel->sekolah = $model->sekolah;
                $tabel->orangtua_id = $model->orangtua_id;
                $tabel->save();

        
           return $this->redirect(['sign-up-siswa-next','id'=>$tabel->id_siswa]);

        }
        else{
            return $this->render('signupsiswa',[
                'model' => $model,
            ]);
        }
    }

    public function actionSignUpSiswaNext($id)
    {
        $siswa = Siswa::find()->where(['id_siswa'=>$id])->one();
        $model = new SignUpsiswanextForm();
        if($model->load(Yii::$app->request->post())){
                $model->signup();
                return $this->redirect(['login']);
        }
        else{
            return $this->render('signupsiswanext',[
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

     public function listLevel()
     {
        $level = [
            ["id"=>"3","level"=>"orangtua"],
            ["id"=>"2","level"=>"guru"],
            ["id"=>"1","level"=>"siswa"],

        ];
        return ArrayHelper::map($level, "id", "level");
     }

}
