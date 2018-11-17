<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MoiQuanHeGiaDinh */

$this->title = 'Sửa Mối quan hệ gia đình';
$this->params['breadcrumbs'][] = ['label' => 'Mối quan hệ gia đình', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="moi-quan-he-gia-dinh-update">

    <?= $this->render('_form_quan_he_gia_dinh', [
        'model' => $model,
    ]) ?>

</div>
