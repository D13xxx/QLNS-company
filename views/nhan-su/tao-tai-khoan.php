<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 19/06/2018
 * Time: 2:55 PM
 */
use yii\helpers\Html;
use app\models\AuthAssignment;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);

$this->title='Tạo tài khoản cho cán bộ: '. $modelUse->ho_ten;
?>
<div class="tao-tai-khoan">
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
                <?= $form->field($model, 'fullname')->textInput(['readOnly'=>true,'value'=>$modelUse->ho_ten])->label('Họ tên') ?>
                <?= $form->field($model, 'username')->label('Tên đăng nhập') ?>
                <?= $form->field($model, 'email')->label('Email') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Mật khẩu') ?>

            </div>
            <div class="panel-footer">
                <?= Html::submitButton('<span class="fa fa-check"></span> Hoàn thành',['class' => 'btn btn-success']) ?>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/nhan-su/'],['class'=>'btn btn-default pull-right'])?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
