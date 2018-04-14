<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;


class OrangtuatugasController extends \yii\web\Controller
{
   public function actionIndex()
    {
        $tugas = Tugas::find()->all();
        return $this->render('index', ['tugasb'=>$tugas]);

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
