<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = 'Thêm tài liệu hướng dẫn mới';
$this->params['breadcrumbs'][] = ['label' => 'Tài liệu hướng dẫn', 'url' => ['tai-lieu-huong-dan']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tai-lieu-huong-dan-create">

    <?= $this->render('_form_tai_lieu_huong_dan', [
        'model' => $model,
    ]) ?>

</div>
