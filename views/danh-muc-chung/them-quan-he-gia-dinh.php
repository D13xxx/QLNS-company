<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MoiQuanHeGiaDinh */

$this->title = 'Tạo Mối quan hệ gia đình';
$this->params['breadcrumbs'][] = ['label' => 'Mối quan hệ gia đình', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moi-quan-he-gia-dinh-create">

    <?= $this->render('_form_quan_he_gia_dinh', [
        'model' => $model,
    ]) ?>

</div>
