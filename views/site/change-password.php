<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title ='Thay đổi mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

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
                <?= $form->field($model, 'oldPassword')->passwordInput()->label('Mật khẩu cũ') ?>
                <?= $form->field($model, 'newPassword')->passwordInput()->label('Mật khẩu mới') ?>
                <?= $form->field($model, 'retypePassword')->passwordInput()->label('Nhập lại mật khẩu') ?>
            </div>
            <div class="panel-footer">
                <?= Html::submitButton('<span class="fa fa-check"></span> Hoàn thành' , ['class' => 'btn btn-success']) ?>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
