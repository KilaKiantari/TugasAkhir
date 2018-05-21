<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\Tugas;


/**
 * Default controller for the `api` module
 */
class SkalaprioritasController extends Controller
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
        		 SELECT nama_tugas,kategori,tanggal_tugas 
                 FROM tugas 
                 WHERE siswa_id ='".$id."'
                 ORDER BY kategori DESC,tanggal_tugas ASC ");

				$result = $command->queryAll();
				return ['status'=>'OK', 'results'=>$result];

	}
}