<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GiaDinhChinhSach */

$this->title = 'Thông tin Gia đình chính sách';
$this->params['breadcrumbs'][] = ['label' => 'Gia đình chính sách', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="gia-dinh-chinh-sach-update">

    <?= $this->render('_form_gia_dinh_chinh_sach', [
        'model' => $model,
    ]) ?>

</div>
