<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */

$this->title = $model->tindakan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tindakan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tindakan_id' => $model->tindakan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tindakan_id' => $model->tindakan_id], [
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
            'tindakan_id',
            'nama_tindakan',
        ],
    ]) ?>

</div>
