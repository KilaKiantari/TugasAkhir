<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class SiswatugasForm extends Model
{
    public $nama_tugas;
    public $kategori;
    public $keterangan;
    public $siswa_id;
    public $tanggal_tugas;
  

    public function rules()
    {
        return [
            [['nama_tugas', 'siswa_id', 'kategori', 'keterangan', 'tanggal_tugas'], 'required'],
            [['siswa_id'], 'integer'],
            [['nama_tugas', 'keterangan', 'kategori'],'string'],
            [['tanggal_tugas'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama_tugas' => 'Nama Tugas',
            'siswa_id'=>'Nama Siswa',
            'kategori'=>'Kategori',
            'keterangan' => 'Keterangan',
            'tanggal_tugas' => 'Tanggal Tugas',
         

        ];
    }

      public function listKategori()
    {
        $kategori = [
            ["id"=>"2","kategori"=>"organisasi"],
            ["id"=>"1","kategori"=>"lain-lain"]
        ];
        return ArrayHelper::map($kategori, "id", "kategori");
    }
    

}
