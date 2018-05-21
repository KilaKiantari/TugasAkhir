<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use backend\models\Tugas;
use backend\models\Grup;

class   SiswatugaspendidikanForm extends Model
{
    public $group_id;
    public $nama_tugas;
    public $keterangan;
    public $kategori;

    public $tanggal_tugas;

  
    public function rules()
    {
        return [
            [['group_id', 'nama_tugas', 'keterangan', 'tanggal_tugas', 'kategori'], 'required'],
            [['group_id'], 'integer'],
            [['nama_tugas', 'keterangan', 'kategori'], 'string'],
            [['tanggal_tugas'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'group_id' => 'Group id',
            'nama_tugas' => 'Nama Tugas',
            'keterangan' => 'Keterangan',
            'tanggal_tugas' => 'Tanggal Tugas',
            'kategori' =>'Kategori',

        ];
    }


    public function listAuthor()
    {
        $author = [
            ["id"=>"g","author"=>"guru"],
           
        ];
        return ArrayHelper::map($author, "id", "author");
    }


       public function listKategori()
    {
        $kategori = [
            ["id"=>"3","kategori"=>"pendidikan"]
        ];
        return ArrayHelper::map($kategori, "id", "kategori");
    }
    
      public function listGroup()
    {
        $grup = Grup::find()->where(['siswa_id'=>Yii::$app->user->identity->siswa_id])->all();
        return ArrayHelper::map($grup, 'id_group', 'namagroup');
    }
}