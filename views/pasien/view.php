<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */

$this->title = $model->pasien_id;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pasien_id' => $model->pasien_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pasien_id' => $model->pasien_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pasien_id',
            'nama_pasien',
            'jenis_kunjungan',
            'nama_dokter',
            'tanggal_kunjungan',
        ],
    ]) ?>

</div>
