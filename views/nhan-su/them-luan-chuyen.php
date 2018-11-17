<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhCongTac */

//$this->title = 'Create Qua Trinh Cong Tac';
//$this->params['breadcrumbs'][] = ['label' => 'Qua Trinh Cong Tacs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="luan-chuyen-can-bo-create">

    <?= $this->render('_form_luan_chuyen', [
        'model' => $model,
        'modelNS'=>$modelNS,
    ]) ?>

</div>
