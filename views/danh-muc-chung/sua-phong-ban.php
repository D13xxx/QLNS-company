<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhongBan */

$this->title = 'Sửa thông tin Phòng ban';
$this->params['breadcrumbs'][] = ['label' => 'Phòng ban', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="phong-ban-update">

    <?= $this->render('_form_phong_ban', [
        'model' => $model,
    ]) ?>

</div>
