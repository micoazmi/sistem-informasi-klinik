<?php

use app\models\Resep;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Resep';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resep', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'resep_id',
            [
                'attribute' => 'nama_pasien', 
                'value' => function ($model) {
                    return $model->pasien ? $model->pasien->nama_pasien : 'No Pasien';  
                },
            ],
            [
                'attribute' => 'nama_obat', 
                'value' => function ($model) {
                    return $model->obat ? $model->obat->nama_obat : 'No Obat';  
                },
            ],
            [
                'attribute' => 'nama_tindakan', 
                'value' => function ($model) {
                    return $model->tindakan ? $model->tindakan->nama_tindakan : 'No Tindakan';  
                },
            ],
            [
                'attribute' => 'nama_dokter', // Display doctor based on nama_dokter
                'value' => function ($model) {
                    // Using the 'dokter' relation to fetch the doctor name
                    return $model->dokter ? $model->dokter->username : 'No Doctor';  // If doctor is not found, show 'No Doctor'
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Resep $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'resep_id' => $model->resep_id]);
                 }
            ],
        ],
    ]); ?>


</div>
