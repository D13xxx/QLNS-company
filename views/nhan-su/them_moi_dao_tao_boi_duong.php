<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuaTrinhDaoTaoBoiDuong */

$this->title = 'THÊM MỚI';
//$this->params['breadcrumbs'][] = ['label' => 'Qua Trinh Dao Tao Boi Duongs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qua-trinh-dao-tao-boi-duong-create">

    <?= $this->render('_form_dao_tao_boi_duong', [
        'model' => $model,
    ]) ?>

</div>
