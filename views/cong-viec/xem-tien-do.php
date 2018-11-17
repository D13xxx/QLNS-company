<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use app\models\CongViec;
/* @var $this yii\web\View */
/* @var $model app\models\CongViec */
$plugin=[
    "advlist autolink lists link charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste image"
];
$toolbar="undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image";

$this->title = $modelCongViec->id;
$this->params['breadcrumbs'][] = ['label' => 'Tiến độ công việc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tien-do">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Tiến độ công việc
                </h4>
            </div>
            <div class="panel-body">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Công việc được giao</h4>
                    </div>
                    <div class="panel-body">
                        <?= DetailView::widget([
                            'model' => $modelCongViec,
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
                                    'attribute'=>'yeu_cau_cong_viec',
                                    'label'=>'Ưu tiên',
                                    'value'=>function($data){
                                        if($data->yeu_cau_cong_viec==CongViec::MD_KhongUuTien){
                                            return 'Không ưu tiên';
                                        }
                                        if($data->yeu_cau_cong_viec==CongViec::MD_BinhThuong){
                                            return 'Bình thường';
                                        }
                                        if($data->yeu_cau_cong_viec==CongViec::MD_UuTien){
                                            return 'Ưu tiên';
                                        }
                                        if($data->yeu_cau_cong_viec==CongViec::MD_Gap){
                                            return 'Khẩn cấp';
                                        }
                                    }
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Phần đã hoàn thành</h4>
                    </div>
                    <div class="panel-body">
                        <?= GridView::widget([
                            'dataProvider'=>$dataTienDo,
                            'filterModel'=>$searchTienDo,
                            'columns'=>[
                                ['class'=>'yii\grid\SerialColumn','contentOptions'=>['style'=>'vertical-align: middle'],],
                                [
                                    'attribute'=>'noi_dung',
                                    'contentOptions'=>['style'=>'vertical-align: middle'],
                                    'format'=>'html',
                                ],
                                [
                                    'attribute'=>'ngay_lap',
                                    'filter'=>\kartik\date\DatePicker::widget([
                                        'model'=>$searchTienDo,
                                        'attribute'=>'ngay_lap',
                                        'pickerButton'=>false,
                                        //'type'=>\kartik\date\DatePicker::TYPE_INPUT,
                                        'pluginOptions'=>[
                                            'autoClose'=>true,
                                            'format'=>'dd/mm/yyyy',
                                        ]
                                    ]),
                                    'headerOptions' => ['style' => 'width:200px;'],
                                    'contentOptions'=>['style'=>'vertical-align: middle'],
                                    'value'=>function($data){
                                        return date("d/m/Y",strtotime($data->ngay_lap));
                                    }
                                ],
                                [
                                    'label'=>'Tiến độ',
                                    'headerOptions' => ['style' => 'width:60px; text-align: center'],
                                    'contentOptions'=>['style'=>'text-align:center; vertical-align: middle'],
                                    'value'=>function($data){
                                        if($data->tien_do==''||$data->tien_do==null){
                                            return '0%';
                                        } else {
                                            return $data->tien_do.'%';
                                        }
                                    }
                                ],

                                [
                                    'label'=>'Đính kèm',
                                    'contentOptions'=>['style'=>'text-align:center; vertical-align: middle'],
                                    'format'=>'raw',
                                    'value'=>function($data){
                                        if($data->tep_dinh_kem!=''||$data->tep_dinh_kem!=null){
                                            $url=\yii\helpers\Url::to(['tai-tep-tin','id'=>$data->id]);
                                            return Html::a('<span class="glyphicon glyphicon-paperclip"></span>',$url,['title'=>'Tải tệp đính kèm']);
                                        } else {
                                            return '';
                                        }
                                    }
                                ],


                            ]
                        ])?>
                    </div>
                </div>
                <?php
                if($modelCongViec->trang_thai==\app\models\CongViec::CV_COPHANHOI){ ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="panel-title">Nguyên nhân bị từ chối</h4>
                        </div>
                        <div class="panel-body">
                            <?= GridView::widget([
                                'summary'=>'',
                                'dataProvider'=>$dataTraLai,
                                'columns'=>[
                                    ['class'=>'yii\grid\SerialColumn'],
                                    [
                                        'attribute'=>'ly_do_tra_lai',
                                        'format'=>'html',
                                    ],
                                    [
                                        'attribute'=>'nguoi_lap',
                                        'value'=>function($data){
                                            $nhanSu=\app\models\User::find()->where(['id'=>$data->nguoi_lap])->one();
                                            return $nhanSu->fullname;
                                        }
                                    ],
                                    [
                                        'attribute'=>'ngay_lap',
                                        'value'=>function($data){
                                            return date("d/m/Y",strtotime($data->ngay_lap));
                                        }
                                    ]
                                ]
                            ])?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
            <div class="panel-footer">
                <?php
                if(Yii::$app->controller->action->id=='quan-ly-cong-viec-giao'){
                    echo Html::a('<span class="fa fa-reply"></span> Quay lại',['quan-ly-cong-viec-giao'],['class'=>'btn btn-default']);
                } else {
                    echo Html::a('<span class="fa fa-reply"></span> Quay lại',['da-hoan-thanh'],['class'=>'btn btn-default']);
                }
                ?>
            </div>
        </div>
</div>
<div class="clearfix"></div>