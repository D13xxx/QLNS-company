<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */

//$this->title = 'Create Qua Trinh Cong Tac';
//$this->params['breadcrumbs'][] = ['label' => 'Qua Trinh Cong Tacs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qua-trinh-cong-tac-create">

    <?= $this->render('_form_qua_trinh_cong_tac', [
        'model' => $model,
    ]) ?>

</div>
