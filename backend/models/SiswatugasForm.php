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
    public $status_tugas;
    public $keterangan;
    public $tanggal_tugas;
    public $tanggal_selesai;
    public $author;
  

    public function rules()
    {
        return [
            [['nama_tugas', 'siswa_id', 'kategori', 'status_tugas','keterangan', 'tanggal_tugas','tanggal_selesai', 'author', ], 'required'],
            [['siswa_id'], 'integer'],
            [['nama_tugas', 'keterangan', 'kategori','author'],'string'],
            [['tanggal_tugas'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama_tugas' => 'Nama Tugas',
            'kategori'=>'Kategori',
            'status_tugas'=>'Status Tugas',
            'keterangan' => 'Keterangan',
            'tanggal_tugas' => 'Tanggal Tugas',
            'tanggal_selesai' => 'Tanggal Selesai',
            'author' =>'Author'

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
     public function listStatustugas()
     {
        $status_tugas = [
            ["id"=>"b","status_tugas"=>"belum"],
            ["id"=>"s","status_tugas"=>"sudah"]

        ];
        return ArrayHelper::map($status_tugas, "id", "status_tugas");
     }

}
