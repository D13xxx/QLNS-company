<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\XaPhuong */

$this->title = "Thông tin xã phường";
$this->params['breadcrumbs'][] = ['label' => 'Phường xã', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xa-phuong-view">

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
                    'ma',
                    'ten',
                    [
                        'attribute'=>'tinh_thanh_id',
                        'value'=>function($data){
                            $tinhThanh=\app\models\TinhThanh::find()->where(['id'=>$data->tinh_thanh_id])->one();
                            return $tinhThanh->ten;
                        }
                    ],
                    [
                        'attribute'=>'quan_huyen_id',
                        'value'=>function($data){
                            $quanHuyen=\app\models\QuanHuyen::find()->where(['id'=>$data->quan_huyen_id])->one();
                            return $quanHuyen->ten;
                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-xa-phuong'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-xa-phuong', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-xa-phuong', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có muốn xóa bản ghi này hay không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/xa-phuong'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
