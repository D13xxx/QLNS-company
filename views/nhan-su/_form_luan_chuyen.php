<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="luan-chuyen-can-bo-form">

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
            $phongBan=\app\models\PhongBan::find()->where(['id'=>$modelNS->phong_ban_id])->one();
            ?>
            <?= $form->field($modelNS, 'phong_ban_cu')->textInput([
                'readOnly'=>true,
                'value'=>$phongBan->ten_day_du,
            ])->label('Phòng hiện tại') ?>
            <?php
            $phongBan1=\app\models\PhongBan::find()->all();
            $listPhongBan= \yii\helpers\ArrayHelper::map($phongBan1,'id','ten_day_du');
            ?>
            <?= $form->field($model,'phong_ban_moi')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listPhongBan,
                'options'=>['prompt'=>'Chọn phòng ban mới ....'],
                'pluginOptions'=>['allowClear'=>true],
            ])?>
            <?= $form->field($model, 'ngay_ap_dung')->widget(\yii\jui\DatePicker::className(),[
                    'options'=>['class'=>'form-control'],
                'dateFormat'=>'dd/MM/yyyy'
            ]) ?>

            <?= $form->field($model, 'so_quyet_dinh')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
