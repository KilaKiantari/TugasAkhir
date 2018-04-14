<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;

class SiswahistoritugasController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $tugas = Tugas::find()->all();
        return $this->render('index', ['tugasb'=>$tugas]);

	}


    public function actionChecklist($id)
    {
        $model = $this->findModel($id);
        $model->status_tugas='s';
        if($model->save()){
            return $this->redirect(['index']);
        }

    }

    protected function findModel($id)
    {
        if (($model = Tugas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	 public function listKategori($isi)
    {
    	$kategori = ["p"=>"pendidikan","o"=>"organisasi","l"=>"lain-lain"];
    	return $kategori[$isi];
    }
     public function listStatustugas($isi)
    {
    	$status_tugas = ["b"=>"belum","s"=>"sudah"];
    	return $status_tugas[$isi];
    }
}
