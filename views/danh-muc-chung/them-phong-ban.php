<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhongBan */

$this->title = 'Thêm Phòng ban mới';
$this->params['breadcrumbs'][] = ['label' => 'Phòng ban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phong-ban-create">

    <?= $this->render('_form_phong_ban', [
        'model' => $model,
    ]) ?>

</div>
