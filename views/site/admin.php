<?php
use yii\helpers\Html;

$this->title = 'Admin Panel';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<ul>
    <li><?= Html::a('Manajemen User', ['/user']) ?></li>
    <li><?= Html::a('Manajemen Wilayah', ['/wilayah']) ?></li>
    <li><?= Html::a('Manajemen Pegawai', ['/pegawai']) ?></li>
    <li><?= Html::a('Manajemen Tindakan', ['/tindakan']) ?></li>
    <li><?= Html::a('Manajemen Obat', ['/obat']) ?></li>

</ul>
