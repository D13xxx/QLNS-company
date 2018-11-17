<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TonGiao */

$this->title = 'Thêm tôn giáo mới';
$this->params['breadcrumbs'][] = ['label' => 'Ton Giaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ton-giao-create">

    <?= $this->render('_form_ton_giao', [
        'model' => $model,
    ]) ?>

</div>
