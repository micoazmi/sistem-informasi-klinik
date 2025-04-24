<?php

use app\models\Pasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pasiens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pasien_id',
            'nama_pasien',
            'jenis_kunjungan',
            [
                'attribute' => 'nama_dokter', // Display doctor based on nama_dokter
                'value' => function ($model) {
                    // Using the 'dokter' relation to fetch the doctor name
                    return $model->dokter ? $model->dokter->username : 'No Doctor';  // If doctor is not found, show 'No Doctor'
                },
            ],
            'tanggal_kunjungan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pasien_id' => $model->pasien_id]);
                 }
            ],
        ],
    ]); ?>


</div>
