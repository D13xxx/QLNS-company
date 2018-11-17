<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\XaPhuong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xa-phuong-form">

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

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nam')->textInput(['maxlength' => 4]) ?>

            <?php
            $nhomSo=\app\models\NhomSo::find()->all();
            $listNhomSo=\yii\helpers\ArrayHelper::map($nhomSo,'id','ten');
            ?>
            <?= $form->field($model, 'nhom_so_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listNhomSo,
                'options'=>[
                    'placeholder'=>'Thuộc nhóm sổ ....?',
                ],
                'pluginOptions'=>['allowClear'=>true],
            ]) ?>

        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/so'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
