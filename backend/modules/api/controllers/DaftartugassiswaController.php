<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\SiswatugasForm;
use backend\models\Tugas;


/**
 * Default controller for the `api` module
 */
class DaftartugassiswaController extends Controller
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
        		SELECT id_tugas,nama_tugas, kategori, keterangan, status_tugas, tanggal_tugas, tanggal_selesai, author, group_id
				FROM tugas
				WHERE siswa_id ='".$id."'");

				$result = $command->queryAll();
			 return ['status'=>'OK', 'results'=>$result];

    }


      public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
     
       $tabel = new Tugas();
       // $model = new SiswatugasForm();

       if(Yii::$app->request->post()){

        $isinya = Yii::$app->request->post();
        
        $tabel->group_id    = 0;
        $tabel->siswa_id    = $isinya['siswa_id'];
        $tabel->nama_tugas  = $isinya['nama_tugas'];
        $tabel->kategori    = $isinya['kategori'];
        $tabel->keterangan  = $isinya['keterangan'];
        $tabel->author      = 's';
        $tabel->status_tugas    = 'b';
        $tabel->tanggal_tugas   = $isinya['tanggal_tugas'];
        $tabel->tanggal_selesai = $isinya['tanggal_selesai'];
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

    public function actionUpdate($id){
      Yii::$app->response->format = Response::FORMAT_JSON;
           $tabel = Tugas::find()->where(['id_tugas'=>$id])->one();
       // $model = new SiswatugasForm();

       if(Yii::$app->request->post()){

        $isinya = Yii::$app->request->post();
        
        $tabel->group_id    = 0;
        $tabel->siswa_id    = $isinya['siswa_id'];
        $tabel->nama_tugas  = $isinya['nama_tugas'];
        $tabel->kategori    = $isinya['kategori'];
        $tabel->keterangan  = $isinya['keterangan'];
        $tabel->author      = 's';
        $tabel->status_tugas    = 'b';
        $tabel->tanggal_tugas   = $isinya['tanggal_tugas'];
        $tabel->tanggal_selesai = $isinya['tanggal_selesai'];
        $tabel->save();

         if($tabel->save()) {
                return ['status'=>'OK'];
            }
            else{
                return ['status'=>'FAIL'];   
            }
        }
    } 


    public function actionDelete($id)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
             DELETE FROM tugas WHERE tugas.id_tugas ='".$id."'");

                $result = $command->queryAll();
             return ['status'=>'OK', 'results'=>$result];


    }

}   