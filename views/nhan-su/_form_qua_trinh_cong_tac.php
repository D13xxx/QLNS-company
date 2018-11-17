<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qua-trinh-cong-tac-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
            'fieldConfig'=>[
                'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-3 control-label'],
            ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
             <?= $form->field($model, 'tu_ngay')->widget(\kartik\widgets\DatePicker::className(),[
                'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
                'pluginOptions'=>[
                    'autoClose'=>true,
                    'format'=>'dd/mm/yyyy',
                    'todayHighlight'=>true,
                ]
            ]) ?>
             <?= $form->field($model, 'den_ngay')->widget(\kartik\widgets\DatePicker::className(),[
                'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
                'pluginOptions'=>[
                    'autoClose'=>true,
                    'format'=>'dd/mm/yyyy',
                    'todayHighlight'=>true,
                ]
            ]) ?>
            <?= $form->field($model, 'qua_trinh_cong_tac')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'bien_che')->textInput(['maxlength' => true]) ?>
            <?php
            $chucVu=\app\models\ChucVu::find()->all();
            $listCV= \yii\helpers\ArrayHelper::map($chucVu,'id','ten_day_du');
            ?>
            <?= $form->field($model, 'chu_vu_id')->widget(\kartik\select2\Select2::className(),[
                    'data'=>$listCV,
                'options'=>['prompt'=>'Chọn chức vụ'],
                'pluginOptions'=>['allowClear'=>true],
            ]) ?>

            <?= $form->field($model, 'chuc_danh')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
