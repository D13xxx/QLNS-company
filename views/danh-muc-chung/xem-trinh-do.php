<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\TrinhDoChuyenMon */

$this->title = "Thông tin trình độ chuyên môn";
$this->params['breadcrumbs'][] = ['label' => 'Trình độ chuyên môn', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trinh-do-chuyen-mon-view">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'ten',
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-trinh-do'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-trinh-do', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-trinh-do', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có muốn xóa bản ghi này hay không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/trinh-do'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
