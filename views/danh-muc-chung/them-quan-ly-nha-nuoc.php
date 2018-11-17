<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuanLyNhaNuoc */

$this->title = 'Thêm Quản lý nhà nước';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý nhà nước', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quan-ly-nha-nuoc-create">

    <?= $this->render('_form_quan_ly_nha_nuoc', [
        'model' => $model,
    ]) ?>

</div>
