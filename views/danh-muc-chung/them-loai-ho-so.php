<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Thêm Chức vụ mới';
$this->params['breadcrumbs'][] = ['label' => 'Chức vụ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chuc-vu-create">

    <?= $this->render('_form_loai_ho_so', [
        'model' => $model,
    ]) ?>

</div>
