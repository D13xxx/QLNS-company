<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KeHoachSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ke-hoach-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'so_hieu') ?>

    <?= $form->field($model, 'noi_dung') ?>

    <?= $form->field($model, 'nguoi_tao') ?>

    <?= $form->field($model, 'ngay_tao') ?>

    <?php // echo $form->field($model, 'chuc_vu_id') ?>

    <?php // echo $form->field($model, 'nguoi_ky') ?>

    <?php // echo $form->field($model, 'loai_hinh') ?>

    <?php // echo $form->field($model, 'trang_thai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
