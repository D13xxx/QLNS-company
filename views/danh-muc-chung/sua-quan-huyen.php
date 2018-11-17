<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuanHuyen */

$this->title = 'Sửa thông tin Quận huyện: '.$model->ma;
$this->params['breadcrumbs'][] = ['label' => 'Quận huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="quan-huyen-update">

    <?= $this->render('_form_quan_huyen', [
        'model' => $model,
    ]) ?>

</div>
