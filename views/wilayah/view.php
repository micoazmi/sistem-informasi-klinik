<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Wilayah $model */

$this->title = $model->wilayah_id;
$this->params['breadcrumbs'][] = ['label' => 'Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wilayah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'wilayah_id' => $model->wilayah_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'wilayah_id' => $model->wilayah_id], [
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
            'wilayah_id',
            'nama_wilayah',
        ],
    ]) ?>

</div>
