<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property integer $id_guru
 * @property string $nama_guru
 * @property string $tgl_lahir
 * @property string $sekolah
 * @property integer $matpel_id
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_guru', 'tgl_lahir', 'sekolah', 'nama_matpel'], 'required'],
            [['nama_guru', 'sekolah'], 'string'],
            [['tgl_lahir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guru' => 'Id Guru',
            'nama_guru' => 'Nama Guru',
            'tgl_lahir' => 'Tgl Lahir',
            'sekolah' => 'Sekolah',
            'nama_matpel' => 'Nama Matapelajaran',
        ];
    }
}
