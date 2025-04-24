<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */

$this->title = 'Update Tindakan: ' . $model->tindakan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tindakan_id, 'url' => ['view', 'tindakan_id' => $model->tindakan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tindakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
