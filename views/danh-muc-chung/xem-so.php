<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
Icon::map($this);

/* @var $this yii\web\View */
/* @var $model app\models\ChucVu */

$this->title = "Thông tin sổ";
$this->params['breadcrumbs'][] = ['label' => 'Sổ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chuc-vu-view">

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
                    'nam',
                    [
                        'attribute'=>'nhom_so_id',
                        'value'=>function($data){
                            $tinhThanh=\app\models\NhomSo::find()->where(['id'=>$data->nhom_so_id])->one();
                            return $tinhThanh->ten;
                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-so'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['/danh-muc-chung/sua-so', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['/danh-muc-chung/xoa-so', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có muốn xóa bản ghi này hay không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/danh-muc-chung/so'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
