<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\LoaiHinhNghiPhep */

$this->title = 'Thông tin loại hình nghỉ phép';
$this->params['breadcrumbs'][] = ['label' => 'Loại hình nghỉ phép', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-hinh-nghi-phep-view">

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
                    'ten',
                    [
                        'attribute'=>'trang_thai',
                        'value'=>function($data){
                            if($data->trang_thai==1)
                            {
                                return 'Hoạt động';
                            } else {
                                return 'Không hoạt động';
                            }
                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-loai-hinh-nghi-phep'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-loai-hinh-nghi-phep', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-loai-hinh-nghi-phep', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/loai-hinh-nghi-phep'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
