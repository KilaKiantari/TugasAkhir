<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grup".
 *
 * @property integer $id_group
 * @property string $namagroup
 * @property integer $tugas_id
 * @property integer $matpel_id
 * @property integer $siswa_id
 * @property integer $guru_id
 */
class Grup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namagroup', 'tugas_id', 'matpel_id', 'siswa_id', 'guru_id'], 'required'],
            [['tugas_id', 'matpel_id', 'siswa_id', 'guru_id'], 'integer'],
            [['namagroup'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_group' => 'Id Group',
            'namagroup' => 'Namagroup',
            'tugas_id' => 'Tugas ID',
            'matpel_id' => 'Matpel ID',
            'siswa_id' => 'Siswa ID',
            'guru_id' => 'Guru ID',
        ];
    }

     public function listGuru()
    {
        $guru = Guru::find()->all();
        return ArrayHelper::map($guru, 'id_guru', 'nama_guru');
    }
}
