<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoaiHinhNghiPhep */

$this->title = 'Cập nhật loại hình nghỉ phép: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loại hình nghỉ phép', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="loai-hinh-nghi-phep-update">

    <?= $this->render('_form_loai_hinh_nghi_phep', [
        'model' => $model,
    ]) ?>

</div>
