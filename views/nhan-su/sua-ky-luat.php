<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DienBienKhenThuong */

//$this->title = 'Update Dien Bien Khen Thuong: {nameAttribute}';
//$this->params['breadcrumbs'][] = ['label' => 'Dien Bien Khen Thuongs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dien-bien-ky-luat-update">

    <?= $this->render('_form_ky_luat', [
        'model' => $model,
    ]) ?>

</div>
