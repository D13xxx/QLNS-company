<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Thêm nhóm sổ mới';
$this->params['breadcrumbs'][] = ['label' => 'Nhóm sổ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhom-so-create">

    <?= $this->render('_form_nhom_so', [
        'model' => $model,
    ]) ?>

</div>
