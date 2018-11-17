<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DienBienKhenThuong */

//$this->title = 'Create Dien Bien Khen Thuong';
//$this->params['breadcrumbs'][] = ['label' => 'Dien Bien Khen Thuongs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dien-bien-ky-luat-create">

    <?= $this->render('_form_ky_luat', [
        'model' => $model,
    ]) ?>

</div>
