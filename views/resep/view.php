<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Resep $model */

$this->title = $model->resep_id;
$this->params['breadcrumbs'][] = ['label' => 'Reseps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resep-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'resep_id' => $model->resep_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'resep_id' => $model->resep_id], [
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
            'resep_id',
            'nama_pasien',
            'nama_obat',
            'nama_tindakan',
            'nama_dokter',
        ],
    ]) ?>

</div>
