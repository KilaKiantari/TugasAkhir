<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;

class SiswaskalaprioritastugasController extends \yii\web\Controller
{
     public function actionIndex()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
               SELECT nama_tugas,kategori,tanggal_tugas 
               FROM tugas 
               ORDER BY kategori DESC,tanggal_tugas ASC ");

                $result = $command->queryAll();
                return $this->render('index',[
                        'result'=>$result]);

	}

	public function listKategori()
    {
        $kategori = [
            ["id"=>"p","kategori"=>"pendidikan"],
            ["id"=>"o","kategori"=>"organisasi"],
            ["id"=>"l","kategori"=>"lain-lain"],
           
        ];
        return ArrayHelper::map($kategori, "id", "kategori");
    }
     public function listStatustugas()
     {
        $status_tugas = [
            ["id"=>"b","status_tugas"=>"belum"],
            ["id"=>"s","status_tugas"=>"sudah"]

        ];
        return ArrayHelper::map($status_tugas, "id", "status_tugas");
     }
}
