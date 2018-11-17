<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CongViec */

$this->title = 'Tạo mới công việc';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục công việc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cong-viec-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
