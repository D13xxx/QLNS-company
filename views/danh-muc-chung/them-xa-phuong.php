<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XaPhuong */

$this->title = 'Thêm Phường xã';
$this->params['breadcrumbs'][] = ['label' => 'Phường xã', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xa-phuong-create">

    <?= $this->render('_form_xa_phuong', [
        'model' => $model,
    ]) ?>

</div>
