<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;
use backend\models\Grup;
use backend\models\Tugas;


/**
 * Default controller for the `api` module
 */
class SiswagrupController extends Controller
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
        		SELECT grup.namagroup,grup.guru_id, guru.nama_guru, guru.nama_matpel, guru.sekolah 
                FROM grup INNER JOIN guru ON grup.guru_id = guru.id_guru GROUP BY grup.namagroup ");

				$result = $command->queryAll();
				return ['status'=>'OK', 'results'=>$result];

	}

      public function actionJoined($id)
    {
          Yii::$app->response->format = Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
        
        SELECT grup.namagroup, guru.nama_guru, guru.nama_matpel, guru.sekolah 
        FROM grup INNER JOIN guru ON grup.guru_id = guru.id_guru 
        WHERE siswa_id ='".$id."'");
        
        $result = $command->queryAll();
        return ['status'=>'OK', 'results'=>$result];    
    }


    //   public function actionJoinedoverflow($id)
    // {
    //     //aksi join harus kirim id = namagroup_matpelid_guruid_siswaid

    //     Yii::$app->response->format = Response::FORMAT_JSON;
    //    $pecah = explode("_", $id);

    //     $tabel = new Grup();
    //     $tabel->namagroup   = $pecah[0];
    //     $tabel->tugas_id    = '1';
    //     $tabel->matpel_id  = '0';
    //     //$tabel->matpel_id   = "$pecah[1]";
    //     $tabel->siswa_id    = $pecah[2];
    //     $tabel->guru_id     = $pecah[1];
    //     if($tabel->save()){
    //         return ['status'=>'OK', 'results'=>$tabel,'namagroup'=>$tabel->namagroup,'guru_id'=>$tabel->guru_id,'siswa_id'=>$tabel->siswa_id];
    //     }
    // }


         public function actionJoinedoverflow()
        {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $tabel = new Grup();
       //$model = new GrupguruForm();

        if(Yii::$app->request->post()){

            $isinya = Yii::$app->request->post(); 

            $tabel->namagroup = $isinya['namagroup'];
            $tabel->tugas_id = 0;
            $tabel->matpel_id = 0;
            $tabel->siswa_id = $isinya['siswa_id'];
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


}