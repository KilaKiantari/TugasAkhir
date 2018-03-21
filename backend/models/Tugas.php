<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHeLper;

/**
 * This is the model class for table "tugas".
 *
 * @property integer $id_tugas
 * @property string $nama_tugas
 * @property integer $matpel_id
 * @property string $kategori
 * @property string $status_tugas
 * @property string $tanggal_tugas
 */
class Tugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tugas', 'matpel_id', 'kategori', 'keterangan' , 'status_tugas', 'tanggal_tugas'], 'required'],
            [['nama_tugas', 'kategori', 'keterangan', 'status_tugas'], 'string'],
            [['matpel_id'], 'integer'],
            [['tanggal_tugas'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tugas' => 'Id Tugas',
            'nama_tugas' => 'Nama Tugas',
            'matpel_id' => 'Matpel ID',
            'kategori' => 'Kategori',
            'keterangan'=>'Keterangan',
            'status_tugas' => 'Status Tugas',
            'tanggal_tugas' => 'Tanggal Tugas',
        ];

    }
    public function listKategori()
    {
        $kategori= [
            ["id"=>"p","kategori"=>"Pendidikan"],
            ["id"=>"o","kategori"=>"Organisasi"],
            ["id"=>"l","kategori"=>"Lain-Lain"]
           ];

            return ArrayHeLper::map($kategori,"id", "kategori");
    }

       public function listStatustugas()
    {
        $status_tugas= [
            ["id"=>"b","status_tugas"=>"Belum"],
            ["id"=>"s","status_tugas"=>"Sudah"]
           ];

            return ArrayHeLper::map($status_tugas,"id", "status_tugas");
    }
}
