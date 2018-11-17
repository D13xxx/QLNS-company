<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CongViec */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Công việc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cong-viec-view">

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
                        'attribute'=>'noi_dung',
                        'format'=>'html',
                    ],
                    [
                        'attribute'=>'ngay_bat_dau',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_bat_dau));
                        }
                    ],
                    [
                        'attribute'=>'ngay_ket_thuc',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_ket_thuc));
                        }
                    ],
                    [
                        'attribute'=>'nguoi_thuc_hien',
                        'value'=>function($data){
                            if(\app\models\NhanSu::find()->where(['id'=>$data->nguoi_thuc_hien])->count()>0){
                                $nguoiNhan=\app\models\NhanSu::find()->where(['id'=>$data->nguoi_thuc_hien])->one();
                                return $nguoiNhan->ho_ten;
                            }
                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['tao-cong-viec'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['dieu-chinh', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-close"></span> Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['chua-giao'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>

</div>
