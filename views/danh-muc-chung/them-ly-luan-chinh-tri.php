<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LyLuanChinhTri */

$this->title = 'Thêm Lý luận chính trị';
$this->params['breadcrumbs'][] = ['label' => 'Lý luận chính trị', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ly-luan-chinh-tri-create">

    <?= $this->render('_form_ly_luan_chinh_tri', [
        'model' => $model,
    ]) ?>

</div>
