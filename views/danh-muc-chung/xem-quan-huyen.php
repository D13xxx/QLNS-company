<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\QuanHuyen */

$this->title = "Thông tin quận huyện: ".$model->ma;
$this->params['breadcrumbs'][] = ['label' => 'Quận huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quan-huyen-view">

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
                        'value'=>function($data)
                        {
                            if(\app\models\TinhThanh::find()->where(['id'=>$data->tinh_thanh_id])->count()>0)
                            {
                                $tinhThanh=\app\models\TinhThanh::find()->where(['id'=>$data->tinh_thanh_id])->one();
                                return $tinhThanh->ten;
                            }
                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-quan-huyen'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-quan-huyen', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-quan-huyen', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có muốn xóa bản ghi này hay không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/quan-huyen'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
