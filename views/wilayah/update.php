<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Wilayah $model */

$this->title = 'Update Wilayah: ' . $model->wilayah_id;
$this->params['breadcrumbs'][] = ['label' => 'Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wilayah_id, 'url' => ['view', 'wilayah_id' => $model->wilayah_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wilayah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
