<?php

namespace backend\modules\api\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\Grup;
use backend\models\Tugas;
use backend\models\Guru;


/**
 * Default controller for the `api` module
 */
class GurugroupController extends Controller
{

		 public function beforeAction($action)
    {
        Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


		  public function actionIndex($id)
    {
    	Yii::$app->response->format = Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
        		SELECT DISTINCT grup.namagroup,  guru.nama_matpel
                FROM grup INNER JOIN guru ON grup.guru_id = guru.id_guru 
				WHERE guru_id ='".$id."'");

				$result = $command->queryAll();
			 return ['status'=>'OK', 'results'=>$result];

    }

 
        public function actionCreate()
    {

       Yii::$app->response->format = Response::FORMAT_JSON;
        $tabel = new Grup();
       //$model = new GrupguruForm();

        if(Yii::$app->request->post()){

            $isinya = Yii::$app->request->post(); 

            $tabel->namagroup = $isinya['namagroup'];
            $tabel->tugas_id = 0;
            $tabel->matpel_id = 0;
            $tabel->siswa_id = 0;
            $tabel->guru_id = $isinya['guru_id'];
            $tabel->save();
           
      if($tabel->save()) {
                return ['status'=>'OK'];
            }
            else{
                return ['status'=>'FAIL'];   
            }
       }
    }

          public function actionBuat($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT nama_guru ,nama_matpel
                FROM guru
                WHERE id_guru ='".$id."'");

                $result = $command->queryAll();
             return ['status'=>'OK', 'results'=>$result];

    }

}    