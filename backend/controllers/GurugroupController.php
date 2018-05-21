<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;
use backend\models\Grup;
use backend\models\Guru;
use backend\models\GrupguruForm;


class GurugroupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $grup = Grup::find()->where(['siswa_id'=>'0'])->all();
        return $this->render('index', ['grups'=>$grup]);

    }

      public function actionView($id)
    {
        $result = Grup::find()->where(['namagroup'=>$id])->all();
		return $this->render('view',['result'=>$result]);
    }


         public function actionCreate()
    {

    
       $tabel = new Grup();
       $model = new GrupguruForm();

       if($model ->load(Yii::$app->request->post())){
        $tabel->namagroup = $model->namagroup;
        $tabel->tugas_id = 0;
        $tabel->matpel_id = $model->matpel_id;
        $tabel->siswa_id = 0;
        $tabel->guru_id = $model->guru_id;
        $tabel->save();
        return $this->redirect(['index']);
    }
     else{
            $model->guru_id = Yii::$app->user->identity->guru_id;
            return $this->render('create', [
                'model'=>$model
                ]);
       }
    }

}



