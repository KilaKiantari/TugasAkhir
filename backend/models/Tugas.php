<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tugas".
 *
 * @property integer $id_tugas
 * @property string $nama_tugas
 * @property integer $siswa_id
 * @property string $kategori
 * @property string $keterangan
 * @property string $status_tugas
 * @property string $tanggal_tugas
 * @property string $tanggal_selesai
 * @property string $author
 * @property integer $group_id
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
            [['nama_tugas', 'siswa_id', 'kategori', 'keterangan', 'tanggal_tugas', 'tanggal_selesai', 'author', 'group_id'], 'required'],
            [['nama_tugas'], 'string'],
            [['siswa_id', 'group_id'], 'integer'],
            [['tanggal_tugas', 'tanggal_selesai'], 'safe'],
            [['kategori', 'status_tugas'], 'string', 'max' => 1],
            [['keterangan'], 'string', 'max' => 225],
            [['author'], 'string', 'max' => 100],
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
            'siswa_id' => 'Siswa ID',
            'kategori' => 'Kategori',
            'keterangan' => 'Keterangan',
            'status_tugas' => 'Status Tugas',
            'tanggal_tugas' => 'Tanggal Tugas',
            'tanggal_selesai' => 'Tanggal Selesai',
            'author' => 'Author',
            'group_id' => 'Group ID',
        ];
    }

    
     
}
