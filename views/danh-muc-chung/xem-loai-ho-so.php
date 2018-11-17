<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\GiaDinhChinhSach */

$this->title = "Thông tin Gia đình chính sách";
$this->params['breadcrumbs'][] = ['label' => 'Gia đình chính sách', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gia-dinh-chinh-sach-view">

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
                    'ma',
                    'ten',
                    [
                        'attribute'=>'trang_thai',
                        'value'=>function($data){
                            if ($data->trang_thai==1){
                                return 'Hoạt động';
                            }elseif($data->trang_thai==2){
                                return 'Không hoạt động';
                            }
                        }
                    ]
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-loai-ho-so'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-loai-ho-so', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-loai-ho-so', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có muốn xóa bản ghi này hay không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/loai-ho-so'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
