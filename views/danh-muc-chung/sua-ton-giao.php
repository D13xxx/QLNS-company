<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TonGiao */

$this->title = 'Sử thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Tôn giáo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="ton-giao-update">

    <?= $this->render('_form_ton_giao', [
        'model' => $model,
    ]) ?>

</div>
