<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pegawai $model */

$this->title = $model->pegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pegawai_id' => $model->pegawai_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pegawai_id' => $model->pegawai_id], [
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
            'pegawai_id',
            'nama_pegawai',
        ],
    ]) ?>

</div>
