<?php
use yii\helpers\Html;

$this->title = 'Halaman Kasir';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<ul>
    <li><?= Html::a('Tagihan', ['/tagihan']) ?></li>
    <li><?= Html::a('Lihat Resep', ['/resep']) ?></li>
</ul>
