<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuanLyNhaNuoc */

$this->title = 'Sửa thông tin Quản lý nhà nước';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý nhà nước', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="quan-ly-nha-nuoc-update">

    <?= $this->render('_form_quan_ly_nha_nuoc', [
        'model' => $model,
    ]) ?>

</div>
