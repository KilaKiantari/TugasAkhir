<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

use common\models\User;
use common\models\Guru;

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
       // $model = new SiswatugasForm();

       if(Yii::$app->request->post()){

        $isinya = Yii::$app->request->post();
        
       
        $tabel->nama_guru   = $isinya['nama_guru'];
        $tabel->tgl_lahir = $isinya['tgl_lahir'];
        $tabel->sekolah   = $isinya['sekolah'];
        $tabel->nama_matpel  = $isinya['nama_matpel'];
     
        $tabel->save();

         if($tabel->save()) {
                return ['status'=>'OK'];
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
}
