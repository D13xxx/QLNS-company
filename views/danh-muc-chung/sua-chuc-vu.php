<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Sửa thông tin Chức vụ';
$this->params['breadcrumbs'][] = ['label' => 'Chức vụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="chuc-vu-update">

    <?= $this->render('_form_chuc_vu', [
        'model' => $model,
    ]) ?>

</div>
