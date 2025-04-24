<?php

use app\models\Pegawai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pegawai_id',
            'nama_pegawai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pegawai_id' => $model->pegawai_id]);
                 }
            ],
        ],
    ]); ?>


</div>
