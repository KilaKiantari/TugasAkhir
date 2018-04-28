<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;
use backend\models\Grup;

class GurugroupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $grup = Grup::find()->all();
        return $this->render('index', ['grups'=>$grup]);

    }

      public function actionView($id)
    {
    	$connection = Yii::$app->getDb();
       $command = $connection->createCommand("
        		SELECT grup.id_group, grup.siswa_id, grup.namagroup, siswa.nama_lengkap, siswa.sekolah,  orangtua.nama_orangtua 
        		FROM grup 
        		INNER JOIN siswa ON grup.siswa_id = siswa.id_siswa 
        		INNER JOIN orangtua ON siswa.orangtua_id = orangtua.id_orangtua 
        		WHERE grup.id_group = '".$id."'");

				$result = $command->queryAll();
				return $this->render('view',[
						'result'=>$result]);
    }

}
