<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\SiswatugaspendidikanForm;


/**
 * Default controller for the `api` module
 */
class DaftartugaspendidikansiswaController extends Controller
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

      public function actionCreate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
     
        $tabel = new Tugas();
       $model = new SiswatugaspendidikanForm();

       if($model ->load(Yii::$app->request->post())){
        $tabel->nama_tugas = $model->nama_tugas;
        $tabel->siswa_id = 0;
        $tabel->kategori = $model->kategori;
        $tabel->keterangan = $model->keterangan;
        $tabel->status_tugas = 'b';
        $tabel->tanggal_tugas = $model->tanggal_tugas;
        $tabel->tanggal_selesai = date('Y-m-d');
        $tabel->author ='s';
        $tabel->group_id = $model->group_id;
        $tabel->save();

         if($tabel->save()) {
                return ['status'=>'OK'];
            }
            else{
                return ['status'=>'FAIL'];   
            }
    }
     else{
             $model->siswa_id = Yii::$app->user->identity->siswa_id;
          
            return ['status'=>'OK', 'result'=>['siswa_id'=>$siswa->siswa_id]];
        }
              
       }
    }

