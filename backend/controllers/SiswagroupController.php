<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;
use backend\models\Grup;
use backend\models\Guru;
use backend\models\Matapelajaran;


class SiswagroupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $grup = Grup::find()->where(['siswa_id'=>'0'])->all();
        return $this->render('index', ['grups'=>$grup]);
    }

    public function actionJoinGrup($id)
    {
        $pecah = explode("_", $id);

        $tabel = new Grup();
        $tabel->namagroup 	= $pecah[0];
        $tabel->tugas_id	= '1';
        $tabel->matpel_id	= $pecah[1];
        $tabel->siswa_id	= Yii::$app->user->identity->siswa_id;
        $tabel->guru_id		= $pecah[2];
        if($tabel->save()){
        	return $this->redirect(['index']);
        }
    }

    public function actionMyGrupJoined()
    {
    	$iduser = Yii::$app->user->identity->siswa_id;
    	$grups	= Grup::find()->where(['siswa_id'=>$iduser])->all();
    	return $this->render('grupjoin', ['grups'=>$grups]);    	
    }
}
