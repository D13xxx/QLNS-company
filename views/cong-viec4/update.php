<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CongViec */

$this->title = 'Update Cong Viec: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cong Viecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cong-viec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
