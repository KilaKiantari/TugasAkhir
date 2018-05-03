<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matapelajaran".
 *
 * @property integer $id_matpel
 * @property string $nama_matpel
 */
class Matapelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matapelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_matpel'], 'required'],
            [['nama_matpel'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matpel' => 'Id Matpel',
            'nama_matpel' => 'Nama Matpel',
        ];
    }
}
