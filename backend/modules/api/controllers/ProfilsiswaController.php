<?php

namespace backend\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

use backend\models\Siswa;


/**
 * Default controller for the `api` module
 */
class ProfilsiswaController extends Controller
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
        	SELECT siswa.nama_lengkap, siswa.sekolah, orangtua.nama_orangtua, user.username, user.email
          FROM user
          INNER JOIN siswa ON user.siswa_id = siswa.id_siswa
          INNER JOIN orangtua ON siswa.orangtua_id = orangtua.id_orangtua
          WHERE user.siswa_id ='".$id."'");

				$result = $command->queryAll();  
        return ['status'=>'OK', 'results'=>$result];
    }
}
