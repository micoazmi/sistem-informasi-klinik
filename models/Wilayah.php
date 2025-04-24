<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $wilayah_id
 * @property string|null $nama_wilayah
 */
class Wilayah extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_wilayah'], 'default', 'value' => null],
            [['wilayah_id'], 'required'],
            [['wilayah_id'], 'integer'],
            [['nama_wilayah'], 'string', 'max' => 255],
            [['wilayah_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wilayah_id' => 'Wilayah ID',
            'nama_wilayah' => 'Nama Wilayah',
        ];
    }

}
