<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Resep $model */

$this->title = 'Update Resep: ' . $model->resep_id;
$this->params['breadcrumbs'][] = ['label' => 'Reseps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resep_id, 'url' => ['view', 'resep_id' => $model->resep_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resep-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
