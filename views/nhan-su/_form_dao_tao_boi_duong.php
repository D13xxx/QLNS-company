<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhDaoTaoBoiDuong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qua-trinh-dao-tao-boi-duong-form">

    <?php $form = ActiveForm::begin([
        'options'=>[
            'class'=>'form-horizontal','enctype'=>'multipart/form-data',
            //'data-pjax'=>true,
            //'id'=>'qua-trinh-dao-tao-id'
        ],
        'fieldConfig'=>[
            'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?= $form->field($model, 'ten_truong')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'chuyen_nganh')->textInput(['maxlength' => true]) ?>
            <?php
            $trinhDo=\app\models\TrinhDoChuyenMon::find()->all();
            $listTrinhDo= \yii\helpers\ArrayHelper::map($trinhDo,'id','ten');
            ?>
            <?= $form->field($model, 'trinh_do_id')->dropDownList($listTrinhDo) ?>

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


            <?= $form->field($model, 'hinh_thuc_dao_tao')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'van_bang')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Cập nhật', ['class' =>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
