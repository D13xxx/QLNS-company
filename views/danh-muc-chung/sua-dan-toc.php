<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DanToc */

$this->title = 'Sửa thông tin Dân tộc';
$this->params['breadcrumbs'][] = ['label' => 'Dân tộc', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="dan-toc-update">

    <?= $this->render('_form_dan_toc', [
        'model' => $model,
    ]) ?>

</div>
