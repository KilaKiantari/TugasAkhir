<?php

namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\db\Query;

use backend\models\Guru;

class GuruprofilController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$ambilidguru = Yii::$app->user->identity->guru_id;
        $guru = Guru::find()->where(['id_guru'=> $ambilidguru])->orderBy(['id_guru' => SORT_ASC])->all();
        return $this->render('index', ['gurus'=>$guru]);
    }
}
