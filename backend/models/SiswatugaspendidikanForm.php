<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class SiswatugaspendidikanForm extends Model
{
    public $group_id;
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
            [['group_id','nama_tugas', 'siswa_id', 'kategori', 'status_tugas','keterangan', 'tanggal_tugas','tanggal_selesai', 'author', ], 'required'],
            [['group_id','siswa_id'], 'integer'],
            [['nama_tugas', 'keterangan', 'kategori','author'],'string'],
            [['tanggal_tugas'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'group_id'=>'Group ID',
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
            ["id"=>"P","kategori"=>"pendidikan"],
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

      public function listGroup()
    {
        $grup = Grup::find()->all();
        return ArrayHelper::map($grup, 'id_group', 'namagroup');
    }

}
