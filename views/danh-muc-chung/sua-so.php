<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Sửa thông tin sổ';
$this->params['breadcrumbs'][] = ['label' => 'Sổ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="chuc-vu-update">

    <?= $this->render('_form_so', [
        'model' => $model,
    ]) ?>

</div>
