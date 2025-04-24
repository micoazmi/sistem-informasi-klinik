<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pasien".
 *
 * @property int $pasien_id
 * @property string|null $nama_pasien
 * @property string|null $jenis_kunjungan
 * @property string|null $nama_dokter
 * @property string|null $tanggal_kunjungan
 */
class Pasien extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'jenis_kunjungan', 'nama_dokter', 'tanggal_kunjungan'], 'default', 'value' => null],
            [['pasien_id'], 'required'],
            [['pasien_id'], 'integer'],
            [['tanggal_kunjungan'], 'safe'],
            [['nama_pasien', 'jenis_kunjungan'], 'string', 'max' => 255],
            [['nama_dokter'], 'string', 'max' => 100],
            [['pasien_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pasien_id' => 'Pasien ID',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kunjungan' => 'Jenis Kunjungan',
            'nama_dokter' => 'Nama Dokter',
            'tanggal_kunjungan' => 'Tanggal Kunjungan',
        ];
    }
 
    public function getDokter()
    {
        return $this->hasOne(User::class, ['user_id' => 'nama_dokter']); // Match nama_dokter with user_id
    }

    // Ambil daftar dokter dengan role "dokter" untuk form select
    public static function getDokterList()
    {
        return ArrayHelper::map(User::find()->where(['role' => 'dokter'])->all(), 'user_id', 'username');
    }

}
