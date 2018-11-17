<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
           
        
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-push-4 text-center ">
             <?php echo Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                'style'=>['width'=>'150px','height'=>'150px','margin'=>'0px auto','class'=>'align-center']
            ]);?>
            <br>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
               
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    
                ]) ?>

                <div class="form-group">
                        <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    
    </div>
</div>
    
