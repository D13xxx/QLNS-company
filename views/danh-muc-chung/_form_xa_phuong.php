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
            <?= $form->field($model, 'ma')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>
            <?php
            $tinhThanh=\app\models\TinhThanh::find()->all();
            $listTinhThanh=\yii\helpers\ArrayHelper::map($tinhThanh,'id','ten')
            ?>
            <?= $form->field($model,'tinh_thanh_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listTinhThanh,
                'options'=>[
                    'prompt'=>'Lựa chọn tỉnh thành .....',
                    'onchange'=>'
                        $.get( "'.\yii\helpers\Url::toRoute('/danh-muc-chung/danh-sach-quan-huyen').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'quan_huyen_id').'" ).html( data );
                            }
                        );
                    '
                ],
                'pluginOptions'=>['allowClear'=>true]
            ])?>

            <?php
            $quanHuyen=\app\models\QuanHuyen::find()->all();
            $listQuanHuyen=\yii\helpers\ArrayHelper::map($quanHuyen,'id','ten');
            ?>
            <?= $form->field($model, 'quan_huyen_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>$listQuanHuyen,
                'options'=>['prompt'=>'Chọn quận huyện....'],
                'pluginOptions'=>['allowClear'=>true],
            ]) ?>

        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? '<span class="fa fa-check"></span> Hoàn thành' : '<span class="fa fa-check"></span> Chỉnh sửa', ['class' =>'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/xa-phuong'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
