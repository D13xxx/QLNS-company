<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KeHoach */
/* @var $form yii\widgets\ActiveForm */


$plugin=[
    "advlist autolink lists link charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste image"
];
$toolbar="undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image";
?>

<div class="cong-viec-form">

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
            <?= $form->field($model, 'so_hieu')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'noi_dung')->widget(\dosamigos\tinymce\TinyMce::className(),[
                'options' => ['rows' => 12],
                'clientOptions' => [
                    'branding'=> false,
                    'plugins' => $plugin,
                    'toolbar' => $toolbar,
                    'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
                ]
            ]) ?>
            <?= $form->field($model, 'loai_hinh')->dropDownList(['prompt'=>'Chọn loại hình','1'=>'Kế hoạch','2'=>'Thông báo']) ?>
            <?= $form->field($model, 'ngay_tao')->widget(\yii\jui\DatePicker::className(),[
                'options'=>['class'=>'form-control'],
                'dateFormat'=>'dd/MM/yyyy'
            ])?>

        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Hoàn thành', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['chua-giao'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
