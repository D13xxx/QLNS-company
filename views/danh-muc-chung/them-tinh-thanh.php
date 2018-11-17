<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TinhThanh */

$this->title = 'Thêm Tỉnh thành';
$this->params['breadcrumbs'][] = ['label' => 'Tỉnh thành', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tinh-thanh-create">

    <?= $this->render('_form_tinh_thanh', [
        'model' => $model,
    ]) ?>

</div>
