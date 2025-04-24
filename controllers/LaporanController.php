<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Pasien;
use app\models\Resep;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

class LaporanController extends Controller
{
    public function actionIndex()
    {
        // Jumlah kunjungan per hari
        $kunjunganPerHari = Pasien::find()
            ->select(['tanggal_kunjungan' => new Expression('DATE(tanggal_kunjungan)'), 'jumlah' => 'COUNT(*)'])
            ->groupBy(new Expression('DATE(tanggal_kunjungan)'))
            ->asArray()
            ->all();

        // Tindakan terbanyak
        $tindakanTerbanyak = Resep::find()
        ->select(['nama_tindakan', 'COUNT(*) AS jumlah'])
        ->groupBy('nama_tindakan')
        ->orderBy(['jumlah' => SORT_DESC])
        ->limit(5)
        ->asArray()
        ->all();

        // Obat paling sering diresepkan
        $obatTerbanyak = Resep::find()
            ->select(['nama_obat', 'jumlah' => 'COUNT(*)'])
            ->groupBy('nama_obat')
            ->orderBy(['jumlah' => SORT_DESC])
            ->limit(5)
            ->asArray()
            ->all();


    
        $obatChart = [];
        foreach ($obatTerbanyak as $row) {
            $namaObat = \app\models\Obat::findOne($row['nama_obat']);
            $obatChart[] = [
                'label' => $namaObat ? $namaObat->nama_obat : 'Tidak diketahui',
                'jumlah' => $row['jumlah']
            ];
        }
        $tindakanChart = [];
        foreach ($tindakanTerbanyak as $row) {
            $namaTindakan = \app\models\Tindakan::findOne($row['nama_tindakan']);
            $tindakanChart[] = [
                'label' => $namaTindakan ? $namaTindakan->nama_tindakan : 'Tidak diketahui',
                'jumlah' => $row['jumlah']
            ];
        }
    

        return $this->render('index', [
            'kunjunganPerHari' => $kunjunganPerHari,
            'tindakanTerbanyak' => $tindakanTerbanyak,
            'obatTerbanyak' => $obatTerbanyak,
            'obatChart' => $obatChart,
            'tindakanChart' => $tindakanChart,
        ]);
    }

    public function actionLaporanObat()
{
    
}

    
}
