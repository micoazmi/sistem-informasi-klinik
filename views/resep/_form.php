<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Resep $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resep-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resep_id')->textInput() ?>

    <?= $form->field($model, 'nama_pasien')->dropDownList(
    \app\models\Resep::getPasienList(),
    ['prompt' => 'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'nama_obat')->dropDownList(
    \app\models\Resep::getObatList(), 
    ['prompt' => 'Pilih Obat']) ?>

    <?= $form->field($model, 'nama_tindakan')->dropDownList(
    \app\models\Resep::getTindakanList(), 
    ['prompt' => 'Pilih Tindakan']) ?>

    <?= $form->field($model, 'nama_dokter')->dropDownList(
    \app\models\Pasien::getDokterList(), 
    ['prompt' => 'Pilih Dokter']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
