<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $obat_id
 * @property string|null $nama_obat
 */
class Obat extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_obat'], 'default', 'value' => null],
            [['obat_id'], 'required'],
            [['obat_id'], 'integer'],
            [['nama_obat'], 'string', 'max' => 255],
            [['obat_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'obat_id' => 'Obat ID',
            'nama_obat' => 'Nama Obat',
        ];
    }

}
