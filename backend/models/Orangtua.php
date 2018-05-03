<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orangtua".
 *
 * @property integer $id_orangtua
 * @property string $nama_orangtua
 * @property string $tanggal_lahir
 */
class Orangtua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orangtua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_orangtua', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama_orangtua'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_orangtua' => 'Id Orangtua',
            'nama_orangtua' => 'Nama Orangtua',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }
}
