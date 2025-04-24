<?php
use yii\helpers\Html;

$this->title = 'Halaman Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<ul>
    <li><?= Html::a('Pendaftaran Pasien', ['/pasien']) ?></li>
</ul>
