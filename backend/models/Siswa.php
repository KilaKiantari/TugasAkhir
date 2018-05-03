<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property integer $id_siswa
 * @property string $nama_lengkap
 * @property string $sekolah
 * @property integer $orangtua_id
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'sekolah', 'orangtua_id'], 'required'],
            [['nama_lengkap', 'sekolah'], 'string'],
            [['orangtua_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => 'Id Siswa',
            'nama_lengkap' => 'Nama Lengkap',
            'sekolah' => 'Sekolah',
            'orangtua_id' => 'Orangtua ID',
        ];
    }

     public function listOrangtua()
    {
        $orangtua = Orangtua::find()->all();
        return ArrayHelper::map($orangtua, 'id_orangtua', 'nama_orangtua');
    }

}
