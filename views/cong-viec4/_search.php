<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CongViecSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cong-viec-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ten') ?>

    <?= $form->field($model, 'noi_dung') ?>

    <?= $form->field($model, 'nguoi_lap') ?>

    <?= $form->field($model, 'ngay_lap') ?>

    <?php // echo $form->field($model, 'ngay_bat_dau') ?>

    <?php // echo $form->field($model, 'ngay_ket_thuc') ?>

    <?php // echo $form->field($model, 'nguoi_thuc_hien') ?>

    <?php // echo $form->field($model, 'trang_thai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
