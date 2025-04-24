<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $tindakan_id
 * @property string|null $nama_tindakan
 */
class Tindakan extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tindakan'], 'default', 'value' => null],
            [['tindakan_id'], 'required'],
            [['tindakan_id'], 'integer'],
            [['nama_tindakan'], 'string', 'max' => 255],
            [['tindakan_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tindakan_id' => 'Tindakan ID',
            'nama_tindakan' => 'Nama Tindakan',
        ];
    }

}
