<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tagihan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tagihan_id')->textInput() ?>

    <?= $form->field($model, 'resep_id')->dropDownList(
    \app\models\Tagihan::getResepList(),
    ['prompt' => 'Pilih Resep']
    ) ?>

    <?= $form->field($model, 'tanggal')->textInput(['placeholder' => 'Enter date (e.g. YYYY-MM-DD)']) ?>

    <?= $form->field($model, 'status_pembayaran')->dropDownList(['Belum' => 'Belum','Sudah'=>"Sudah"],['prompt'=>'Pilih Status']) ?>

    <?= $form->field($model, 'total_biaya')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
