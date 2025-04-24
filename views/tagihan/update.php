<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */

$this->title = 'Update Tagihan: ' . $model->tagihan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tagihans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tagihan_id, 'url' => ['view', 'tagihan_id' => $model->tagihan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tagihan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
