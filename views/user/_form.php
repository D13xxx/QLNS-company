<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
  <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
            'fieldConfig'=>[
                'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-2\"></div>\n<div class=\"col-sm-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
            ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readOnly'=>true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList(['10'=>'Hoạt động',''=>'Không hoạt động']) ?>

            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>


<!--            $nhomPB=\app\models\PhongBan::find()->all();-->
<!--            $listNhomPB=\yii\helpers\ArrayHelper::map($nhomPB,'id','ten_day_du');-->
<!--            -->
<!--            = $form->field($model, 'phong_ban_id')->widget(\kartik\select2\Select2::className(),[-->
<!--                'data'=>$listNhomPB,-->
<!--                'options'=>[-->
<!--                    'placeholder'=>'Thuộc phòng ban ....?',-->
<!--                ],-->
<!--                'pluginOptions'=>['allowClear'=>true],-->
<!--            ]) ?>-->

        </div>
        <div class="panel-footer">
            <?= Html::submitButton('<span class="fa fa-check"></span> Cập nhật', ['class' =>'btn btn-success']) ?>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
