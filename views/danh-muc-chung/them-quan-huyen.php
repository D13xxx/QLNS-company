<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuanHuyen */

$this->title = 'Thêm Quận huyện';
$this->params['breadcrumbs'][] = ['label' => 'Quận huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quan-huyen-create">

    <?= $this->render('_form_quan_huyen', [
        'model' => $model,
    ]) ?>

</div>
