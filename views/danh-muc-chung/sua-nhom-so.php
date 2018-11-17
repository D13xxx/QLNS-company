<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Sửa thông tin nhóm sổ văn bản';
$this->params['breadcrumbs'][] = ['label' => 'Nhóm sổ văn bản', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="chuc-vu-update">

    <?= $this->render('_form_nhom_so', [
        'model' => $model,
    ]) ?>

</div>
