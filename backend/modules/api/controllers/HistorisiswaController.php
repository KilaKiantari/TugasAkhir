<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\Tugas;


/**
 * Default controller for the `api` module
 */
class HistorisiswaController extends Controller
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

     protected function findModel($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (($model = Tugas::findOne($id)) !== null) {
            return $model;
        } else {
            // throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionChecklist($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);
        $model->status_tugas='s';
        $model->tanggal_selesai=date('Y-m-d');
        if($model->save()){
            // $result = $command->queryAll();
                return ['status'=>'OK', 'results'=>$model];
        }
    
    }
}