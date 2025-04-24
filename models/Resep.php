<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "resep".
 *
 * @property int $resep_id
 * @property string|null $nama_pasien
 * @property string|null $nama_obat
 * @property string|null $nama_tindakan
 * @property string|null $nama_dokter
 */
class Resep extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'nama_obat', 'nama_tindakan', 'nama_dokter'], 'default', 'value' => null],
            [['resep_id'], 'required'],
            [['resep_id'], 'integer'],
            [['nama_pasien', 'nama_obat', 'nama_tindakan', 'nama_dokter'], 'string', 'max' => 255],
            [['resep_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'resep_id' => 'Resep ID',
            'nama_pasien' => 'Nama Pasien',
            'nama_obat' => 'Nama Obat',
            'nama_tindakan' => 'Nama Tindakan',
            'nama_dokter' => 'Nama Dokter',
        ];
    }

    public static function getPasienList()
    {
        return ArrayHelper::map(Pasien::find()->all(), 'pasien_id', 'nama_pasien');
    }
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['pasien_id' => 'nama_pasien']); 
    }

    public static function getObatList()
    {
        return ArrayHelper::map(Obat::find()->all(), 'obat_id', 'nama_obat');
    }
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['obat_id' => 'nama_obat']); 
    }


    public static function getTindakanList()
    {
        return ArrayHelper::map(Tindakan::find()->all(), 'tindakan_id', 'nama_tindakan');
    }
    
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['tindakan_id' => 'nama_tindakan']); 
    }


    public function getDokter()
    {
        return $this->hasOne(User::class, ['user_id' => 'nama_dokter']); 
    }
 

}
