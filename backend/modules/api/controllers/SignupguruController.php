<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\User;
use backend\models\Guru;
use backend\models\SignUpgurunextForm;

/**
 * Default controller for the `api` module
 */
class SignupguruController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionSignup()
    {
    	 Yii::$app->response->format = Response::FORMAT_JSON;

        
       $tabel = new Guru();
       //$model = new SignUpguruForm();

       if(Yii::$app->request->post()){

        $isinya = Yii::$app->request->post();
        
       
        $tabel->nama_guru   = $isinya['nama_guru'];
        //$tabel->tgl_lahir = $isinya['tgl_lahir'];
        $tabel->tgl_lahir = date('Y-m-d');
        $tabel->sekolah   = $isinya['sekolah'];
        $tabel->nama_matpel  = $isinya['nama_matpel'];

     
        $tabel->save();

         if($tabel->save()) {
                return ['status'=>'OK', 'id_guru'=>$tabel->id_guru];
            }
            else{
                return ['status'=>'FAIL'];   
            }
        }
        //  else{
        //          $model->siswa_id = $id;
              
        //         return ['status'=>'OK', 'result'=>['siswa_id'=>$siswa->siswa_id]];
        // }
    }

       public function actionSignupnext($id)
    {
         Yii::$app->response->format = Response::FORMAT_JSON;

       $guru= Guru::find()->where(['id_guru'=>$id])->one();
       $tabel = new SignUpgurunextForm();
       //$model = new SignUpguruForm();

       if(Yii::$app->request->post()){
       

        $isinya = Yii::$app->request->post();
        // $tabel->guru_id=$guru->id_guru;
        $tabel->guru_id     = $guru['id_guru'];
        $tabel->firstname   = "Guru";
        $tabel->username   = $isinya['username'];
        $tabel->password  = $isinya['password'];
        $tabel->email  = $isinya['email'];
        $tabel->level = '2';

        //$tabel->signup2();

         if($tabel->signup2()) {
                return ['status'=>'OK'];
            }
            else{
                return ['status'=>'FAIL'];   
            }
        }
    
    }

    public function actionIndex($id)
    {
       Yii::$app->response->format = Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT id_guru,nama_guru, sekolah, nama_matpel
                FROM guru
                WHERE id_guru ='".$id."'");

                $result = $command->queryAll();
                return ['status'=>'OK', 'results'=>$result];

    }
}
