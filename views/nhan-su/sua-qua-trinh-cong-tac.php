<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */

//$this->title = 'Update Qua Trinh Cong Tac: {nameAttribute}';
//$this->params['breadcrumbs'][] = ['label' => 'Qua Trinh Cong Tacs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qua-trinh-cong-tac-update">

    <?= $this->render('_form_qua_trinh_cong_tac', [
        'model' => $model,
    ]) ?>

</div>
