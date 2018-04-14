<?php

namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Tugas;

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
        $model = new Tugas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $model->id_tugas]);
        }
        else{
            return $this->render('create', ['model' => $model]);
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
