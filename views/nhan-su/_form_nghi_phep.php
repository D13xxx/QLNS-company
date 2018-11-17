<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhNghiPhep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qua-trinh-nghi-phep-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
        'fieldConfig'=>[
            'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>
        <div class="panel panel-primary">
            <div class="panel-body">

                <?php
                $loaiHinhNghiPhep=\app\models\LoaiHinhNghiPhep::find()->where(['trang_thai'=>1])->all();
                $listLoaiHinhNghiPhep=\yii\helpers\ArrayHelper::map($loaiHinhNghiPhep,'id','ten');
                ?>
                <?= $form->field($model, 'loai_hinh_nghi_phep_id')->widget(\kartik\select2\Select2::className(),[
                        'data'=>$listLoaiHinhNghiPhep,
                    'options'=>['prompt'=>'Chọn loại hình nghỉ phép...'],
                    'pluginOptions'=>['allowClear'=>true],
                ]) ?>

                <?= $form->field($model,'ly_do')->textarea(['rows'=>6])?>
                
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
            </div>
            <div class="panel-footer">
                <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
