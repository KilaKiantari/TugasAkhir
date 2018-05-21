<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

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
        		SELECT grup.namagroup, guru.nama_guru, guru.nama_matpel, guru.sekolah 
                FROM grup INNER JOIN guru ON grup.guru_id = guru.id_guru ");

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
}