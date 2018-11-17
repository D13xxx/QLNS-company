<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DanToc */

$this->title = 'Thêm Dân tộc';
$this->params['breadcrumbs'][] = ['label' => 'Dân tộc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dan-toc-create">

    <?= $this->render('_form_dan_toc', [
        'model' => $model,
    ]) ?>

</div>
