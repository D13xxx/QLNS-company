<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Thêm sổ văn bản mới';
$this->params['breadcrumbs'][] = ['label' => 'Sổ văn bản', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chuc-vu-create">

    <?= $this->render('_form_so', [
        'model' => $model,
    ]) ?>

</div>
