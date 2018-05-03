<?php

namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Siswa;

class SiswaprofilController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$ambilidsiswa = Yii::$app->user->identity->siswa_id;
        $siswa = Siswa::find()->where(['id_siswa'=> $ambilidsiswa])->orderBy(['id_siswa' => SORT_ASC])->all();
        return $this->render('index', ['siswas'=>$siswa]);
    }
}
