<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->textInput() ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kunjungan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dokter')->dropDownList(
    \app\models\Pasien::getDokterList(), 
    ['prompt' => 'Pilih Dokter']) ?>

    <?= $form->field($model, 'tanggal_kunjungan')->textInput(['maxlength' => true, 'placeholder' => 'Enter date (e.g. YYYY-MM-DD)']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
