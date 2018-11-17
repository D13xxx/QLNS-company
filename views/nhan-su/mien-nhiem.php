<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Miễn nhiệm cán bộ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bo-nhiem-can-bo-form">

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
                <?= Html::encode($this->title)?>
            </h4>
        </div>
        <div class="panel-body">
            <div class="col-sm-1" style="text-align: center">
                <?php
                if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                    echo Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
                } else {
                    echo Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
                }
                ?>
            </div>
            <div class="col-sm-11">
                <?=$form->field($model,'ho_ten')->textInput(['readOnly'=>true]);?>
                <?= $form->field($model,'ngay_sinh')->textInput(['readOnly'=>true,'value'=>date("d/m/Y",strtotime($model->ngay_sinh))]);?>
                <?= $form->field($model,'que_quan')->textInput(['readOnly'=>true]);?>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Chức vụ hiện tại</h4>
                    </div>
                    <div class="panel-body">
                        <?php
                        $chucVu=\app\models\ChucVu::find()->where(['id'=>$model->chuc_vu_id])->one();
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Chức vụ:</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $chucVu->ten_day_du?>" readonly="true" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Chức vụ miễn nhiễm</h4>
                    </div>
                    <div class="panel-body">
                        <?php
                        $chucVu1=\app\models\ChucVu::find()->all();
                        $listChucVu= \yii\helpers\ArrayHelper::map($chucVu1,'id','ten_day_du');
                        ?>
                        <?= $form->field($model,'chuc_vu_id')->widget(\kartik\select2\Select2::className(),[
                            'data'=>$listChucVu,
                            'options'=>['prompt'=>'Chọn chức vụ miễn nhiếm....'],
                            'pluginOptions'=>['allowClear'=>true]
                        ])->label('Chức vụ mới')?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton('<span class="fa fa-check"></span> Hoàn thành', ['class' =>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
