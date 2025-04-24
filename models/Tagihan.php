<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "tagihan".
 *
 * @property int $tagihan_id
 * @property int|null $resep_id
 * @property string|null $tanggal
 * @property string|null $status_pembayaran
 * @property float|null $total_biaya
 */
class Tagihan extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resep_id', 'tanggal', 'status_pembayaran', 'total_biaya'], 'default', 'value' => null],
            [['tagihan_id'], 'required'],
            [['tagihan_id', 'resep_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['total_biaya'], 'number'],
            [['status_pembayaran'], 'string', 'max' => 255],
            [['tagihan_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tagihan_id' => 'Tagihan ID',
            'resep_id' => 'Resep ID',
            'tanggal' => 'Tanggal',
            'status_pembayaran' => 'Status Pembayaran',
            'total_biaya' => 'Total Biaya',
        ];
    }

    
    public static function getResepList()
    {
        return ArrayHelper::map(Resep::find()->all(), 'resep_id', 'resep_id');
    }



}
