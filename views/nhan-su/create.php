<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NhanSu */

$this->title = 'Thêm cán bộ nhân viên';
$this->params['breadcrumbs'][] = ['label' => 'Nhân sự', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-su-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
