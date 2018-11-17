<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CongViec;

/* @var $this yii\web\View */
/* @var $model app\models\CongViec */
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
            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'noi_dung')->widget(\dosamigos\tinymce\TinyMce::className(),[
                'options' => ['rows' => 24],
                'language' => 'vi',
                'clientOptions' => [
                    'branding'=> false,
                    'plugins' => $plugin,
                    'toolbar' => $toolbar,
                    'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
                ]
            ]) ?>


            <?= $form->field($model, 'ngay_bat_dau')->widget(\yii\jui\DatePicker::className(),[
                'options'=>['class'=>'form-control'],
                'dateFormat'=>'dd/MM/yyyy'
            ])?>
            <?= $form->field($model, 'ngay_ket_thuc')->widget(\yii\jui\DatePicker::className(),[
                'options'=>['class'=>'form-control'],
                'dateFormat'=>'dd/MM/yyyy'
            ])?>
            <?php
            $nguoiDung=\app\models\User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
            if($nguoiDung->phong_ban_id==''||$nguoiDung->phong_ban_id==null){
                $nhanVien=\app\models\NhanSu::find()
                    ->where(['and',['<>','user_id',$nguoiDung->id],['or',['<>','user_id',''],['<>','user_id',null]]])
                    ->all();
                $listNhanVien=\yii\helpers\ArrayHelper::map($nhanVien,'id','ho_ten');
            } else {
                $nhanVien=\app\models\NhanSu::find()
                    ->where(['and',['phong_ban_id'=>$nguoiDung->phong_ban_id],['<>','user_id',$nguoiDung->id],['or',['<>','user_id',''],['<>','user_id',null]]])
                    ->all();
                $listNhanVien=\yii\helpers\ArrayHelper::map($nhanVien,'id','ho_ten');
            }
            ?>
            <?= $form->field($model, 'nguoi_thuc_hien')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listNhanVien,
                'options'=>['prompt'=>'Giao việc cho nhân viên....'],
                'pluginOptions'=>['allowClear'=>true],
            ]) ?>
            <?php
            $listYeuCau=array(CongViec::MD_KhongUuTien=>'Không ưu tiên',CongViec::MD_BinhThuong=>'Bình thường',CongViec::MD_UuTien=>'Ưu tiên',CongViec::MD_Gap=>'Khẩn cấp')
            ?>
            <?= $form->field($model,'yeu_cau_cong_viec')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listYeuCau,
                'options'=>['prompt'=>'Chọn mức độ ưu tiên ....'],
                'pluginOptions'=>['allowClear'=>true],
            ])?>

        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Hoàn thành', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['chua-giao'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
