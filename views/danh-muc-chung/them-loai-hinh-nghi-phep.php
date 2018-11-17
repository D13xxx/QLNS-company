<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LoaiHinhNghiPhep */

$this->title = 'Thêm loại hình nghỉ phép';
$this->params['breadcrumbs'][] = ['label' => 'Loại hình nghỉ phép', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-hinh-nghi-phep-create">

    <?= $this->render('_form_loai_hinh_nghi_phep', [
        'model' => $model,
    ]) ?>

</div>
