<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\LoaiHinhNghiPhep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loai-hinh-nghi-phep-form">

    <?php $form = ActiveForm::begin([
            'layout'=>'horizontal',
        ]); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?= Html::encode($this->title) ?>
                </h4>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'trang_thai')->dropDownList(['1'=>'Hoạt động','0'=>'Không hoạt động']) ?>
            </div>
            <div class="panel-footer">
                <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/loai-hinh-nghi-phep'],['class'=>'btn btn-default pull-right'])?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
