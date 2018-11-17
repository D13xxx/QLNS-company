<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TinhThanh */

$this->title = 'Sửa thông tin Tỉnh thành';
$this->params['breadcrumbs'][] = ['label' => 'Tỉnh thành', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->ma, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="tinh-thanh-update">

    <?= $this->render('_form_loai_ho_so', [
        'model' => $model,
    ]) ?>

</div>
