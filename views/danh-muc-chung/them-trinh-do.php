<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrinhDoChuyenMon */

$this->title = 'Thêm trình độ chuyên môn';
$this->params['breadcrumbs'][] = ['label' => 'Trình độ chuyên môn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trinh-do-chuyen-mon-create">

    <?= $this->render('_form_trinh_do', [
        'model' => $model,
    ]) ?>

</div>
