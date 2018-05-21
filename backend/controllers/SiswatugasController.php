<?php

namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;
use backend\models\SiswatugasForm;

class SiswatugasController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $tugas = Tugas::find()->all();
        return $this->render('index', ['tugass'=>$tugas]);
    }

    public function actionView($id)
    {
        $tugas = Tugas::find()->where(['id_tugas'=>$id])->one();
        return $this->render('view', ['model' => $tugas]);
    }


    
         public function actionCreate()
    {
       $tabel = new Tugas();
       $model = new SiswatugasForm();

       if($model ->load(Yii::$app->request->post())){
        $tabel->group_id = 0;
        $tabel->nama_tugas = $model->nama_tugas;
        $tabel->siswa_id = $model->siswa_id;
        $tabel->kategori = $model->kategori;
        $tabel->keterangan = $model->keterangan;
        $tabel->status_tugas = 'b';
        $tabel->tanggal_tugas = $model->tanggal_tugas;
        $tabel->tanggal_selesai = date('Y-m-d');
        $tabel->author = 's';
        $tabel->save();

        return $this->redirect(['index']);
    }
     else{
         $model->siswa_id = Yii::$app->user->identity->siswa_id;
            return $this->render('create', [
                'model'=>$model
                ]);
       }
    }

    

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tugas]);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
    	$this->findModel($id)->delete();
    	return $this->redirect(['index']);
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
            ["id"=>"o","kategori"=>"organisasi"],
            ["id"=>"l","kategori"=>"lain-lain"]
        ];
        return ArrayHelper::map($kategori, "id", "kategori");
    }
    
 
}
