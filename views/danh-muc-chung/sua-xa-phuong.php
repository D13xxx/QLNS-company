<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\XaPhuong */

$this->title = 'Sửa thông tin xã phường: '.$model->ma;
$this->params['breadcrumbs'][] = ['label' => 'Phường xã', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="xa-phuong-update">

    <?= $this->render('_form_xa_phuong', [
        'model' => $model,
    ]) ?>

</div>
