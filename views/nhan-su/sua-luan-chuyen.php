<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NhanSu */

//$this->title = 'Sửa thông tin CBNV';
//$this->params['breadcrumbs'][] = ['label' => 'Nhân sự', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="luan-chuyen-can-bo-update">

    <?= $this->render('_form_luan_chuyen', [
        'model' => $model,
        'modelNS'=>$modelNS,
    ]) ?>

</div>
