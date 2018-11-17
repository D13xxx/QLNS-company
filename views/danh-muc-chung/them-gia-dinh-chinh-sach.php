<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GiaDinhChinhSach */

$this->title = 'Thêm Gia đình chính sách';
$this->params['breadcrumbs'][] = ['label' => 'Gia đình chính sách', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gia-dinh-chinh-sach-create">

    <?= $this->render('_form_gia_dinh_chinh_sach', [
        'model' => $model,
    ]) ?>

</div>
