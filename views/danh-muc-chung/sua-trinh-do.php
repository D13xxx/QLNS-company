<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrinhDoChuyenMon */

$this->title = 'Sửa thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Trình độ chuyên môn', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="trinh-do-chuyen-mon-update">

    <?= $this->render('_form_trinh_do', [
        'model' => $model,
    ]) ?>

</div>
