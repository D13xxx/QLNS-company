<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LyLuanChinhTri */

$this->title = 'Sửa thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Lý luận chính trị', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="ly-luan-chinh-tri-update">

    <?= $this->render('_form_ly_luan_chinh_tri', [
        'model' => $model,
    ]) ?>

</div>
