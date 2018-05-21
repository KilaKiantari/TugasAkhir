<?php

namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;
use backend\models\TugasForm;

class GurutugaspendidikanController extends \yii\web\Controller
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
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
                SELECT id_tugas,nama_tugas,keterangan,tanggal_tugas, author, group_id,tanggal_selesai
                FROM tugas
                WHERE author = 'g'");

                $result = $command->queryAll();
                return $this->render('index',[
                        'result'=>$result]);

    }

    public function actionView($id)
    {
        $tugas = Tugas::find()->where(['id_tugas'=>$id])->one();
        return $this->render('view', ['model' => $tugas]);
    }

    public function actionCreate()
    {
       $tabel = new Tugas();
       $model = new TugasForm();

       if($model ->load(Yii::$app->request->post())){
        $tabel->nama_tugas = $model->nama_tugas;
        $tabel->siswa_id = 0;
        $tabel->kategori = 'p';
        $tabel->keterangan = $model->keterangan;
        $tabel->status_tugas = 'b';
        $tabel->tanggal_tugas = $model->tanggal_tugas;
        $tabel->tanggal_selesai = date('Y-m-d');
        $tabel->author = $model->author;
        $tabel->group_id = $model->group_id;
        $tabel->save();

        return $this->redirect(['index']);
    }
     else{
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
  public function listAuthor()
    {
        $author = [
            ["id"=>"g","author"=>"guru"],
           
        ];
        return ArrayHelper::map($author, "id", "author");
    }
   
}
