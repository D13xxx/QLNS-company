<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeHoach */

$this->title = 'Create Ke Hoach';
$this->params['breadcrumbs'][] = ['label' => 'Ke Hoaches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ke-hoach-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
