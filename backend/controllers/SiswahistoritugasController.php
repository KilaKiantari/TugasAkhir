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
