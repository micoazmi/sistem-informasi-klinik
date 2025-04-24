<?php
use miloschuman\highcharts\Highcharts;
use app\models\Tindakan;
use app\models\Obat;
$this->title = 'Laporan Klinik';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<h3>Jumlah Kunjungan Pasien per Hari</h3>
<?= Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'Kunjungan Harian'],
        'xAxis' => [
            'categories' => array_column($kunjunganPerHari, 'tanggal_kunjungan')
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah Kunjungan']
        ],
        'series' => [
            [
                'name' => 'Pasien',
                'data' => array_map('intval', array_column($kunjunganPerHari, 'jumlah'))
            ]
        ]
    ]
]); ?>

<h3>Tindakan Terbanyak</h3>
<?= Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'Tindakan Terbanyak'],
        'xAxis' => [
            'categories' => array_column($tindakanChart, 'label'),
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah']
        ],
        'series' => [
            [
                'name' => 'Jumlah',
                'data' => array_column($tindakanChart, 'jumlah'),
            ]
        ]
    ]
]); ?>

<h3>Obat Paling Banyak Diresepkan</h3>


<?= Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'bar'],
        'title' => ['text' => 'Obat Terbanyak'],
        'xAxis' => [
            'categories' => array_column($obatChart, 'label'),
            'title' => ['text' => 'Obat']
        ],
        'yAxis' => [
            'title' => ['text' => 'Jumlah Diresepkan']
        ],
        'series' => [
            [
                'name' => 'Jumlah',
                'data' => array_map('intval', array_column($obatChart, 'jumlah'))
            ]
        ]
    ]
]) ?>

