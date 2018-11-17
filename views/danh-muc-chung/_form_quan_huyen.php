<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\QuanHuyen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quan-huyen-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
            'fieldConfig'=>[
                'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-3 control-label'],
            ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= $form->field($model, 'ma')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>
            <?php
            $tinhThanh=\app\models\TinhThanh::find()->all();
            $listTinhThanh=\yii\helpers\ArrayHelper::map($tinhThanh,'id','ten');
            ?>
            <?= $form->field($model, 'tinh_thanh_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listTinhThanh,
                'options'=>['placeholder'=>'Thuộc tỉnh thành ....?'],
                'pluginOptions'=>['allowClear'=>true],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/quan-huyen'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
