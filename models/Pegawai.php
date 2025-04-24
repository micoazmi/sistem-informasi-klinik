<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $pegawai_id
 * @property string|null $nama_pegawai
 */
class Pegawai extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pegawai'], 'default', 'value' => null],
            [['pegawai_id'], 'required'],
            [['pegawai_id'], 'integer'],
            [['nama_pegawai'], 'string', 'max' => 255],
            [['pegawai_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'nama_pegawai' => 'Nama Pegawai',
        ];
    }

}
