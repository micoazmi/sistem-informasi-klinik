<?php
use yii\helpers\Html;

$this->title = 'Halaman Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Selamat datang, Dr. <?= Html::encode(Yii::$app->user->identity->username) ?>!</p>

<ul>
    <li><?= Html::a('Lihat Daftar Pasien', ['/pasien']) ?></li>
    <li><?= Html::a('Resep dan Tindakan', ['/resep']) ?></li>
</ul>
