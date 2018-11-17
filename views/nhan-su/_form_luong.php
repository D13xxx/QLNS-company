<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DienBienLuong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dien-bien-luong-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
            'fieldConfig'=>[
                'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-3 control-label'],
            ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-body">

            <?= $form->field($model, 'ngach_cong_chu')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ma_ngach')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'bac_luong')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'he_so_luong')->textInput() ?>

            <?= $form->field($model, 'muc_huong')->textInput(['maxlength' => true]) ?>

           
            <?= $form->field($model, 'ngay_thang')->widget(\kartik\widgets\DatePicker::className(),[
                'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
                'pluginOptions'=>[
                    'autoClose'=>true,
                    'format'=>'dd/mm/yyyy',
                    'todayHighlight'=>true,
                ]
            ]) ?>

            <?= $form->field($model, 'loai_nang_luong')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'so_quyet_dinh')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
