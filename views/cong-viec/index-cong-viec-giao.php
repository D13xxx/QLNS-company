<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CongViec;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CongViecSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục công việc đã giao';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cong-viec-index">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Html::encode($this->title)?>
            </h4>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'ten',
                    [
                        'attribute'=>'ngay_bat_dau',
                        'filter'=>\yii\jui\DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'ngay_bat_dau',
                            'dateFormat'=>'dd/MM/yyyy',
                            'options'=>['class'=>'form-control']
                        ]),
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_bat_dau));
                        }
                    ],
                    [
                        'attribute'=>'ngay_ket_thuc',
                        'filter'=>\yii\jui\DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'ngay_ket_thuc',
                            'dateFormat'=>'dd/MM/yyyy',
                            'options'=>['class'=>'form-control']
                        ]),
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_ket_thuc));
                        }
                    ],
                    [
                        'attribute'=>'nguoi_thuc_hien',
                        'value'=>function($data){
                            if(\app\models\user::find()->where(['id'=>$data->nguoi_thuc_hien])->count()>0){
                                $nguoiNhan=\app\models\user::find()->where(['id'=>$data->nguoi_thuc_hien])->one();
                                return $nguoiNhan->fullname;
                            }
                        }
                    ],
                    [
                        'label'=>'Tiến độ',
                        'contentOptions'=>['style'=>'text-align: right'],
                        'value'=>function($data){
                            $tienDo=\app\models\CongViecTienDo::find()->where(['cong_viec_id'=>$data->id])->all();
                            $TongTienDo=0;
                            foreach ($tienDo as $value){
                                $TongTienDo += $value->tien_do;
                            }
                            return $TongTienDo. '%';
                        }
                    ],
                    [
                        'attribute'=>'yeu_cau_cong_viec',
                        'label'=>'Ưu tiên',
                        'filter'=>array(CongViec::MD_KhongUuTien=>'Không ưu tiên',CongViec::MD_BinhThuong=>'Bình thường',CongViec::MD_UuTien=>'Ưu tiên',CongViec::MD_Gap=>'Khẩn cấp'),
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
                    [
                        'attribute'=>'trang_thai',
                        'filter'=>array(CongViec::CV_GIAOVIEC=>'Chưa thực hiện',CongViec::CV_DANGTIENHANH=>'Đang thực hiện',CongViec::CV_HOANTHANH=>'Đã hoàn thành'),
                        'value'=>function($data){
                            if($data->trang_thai==\app\models\CongViec::CV_GIAOVIEC){
                                return 'Chưa thực hiện';
                            }
                            if($data->trang_thai==\app\models\CongViec::CV_DANGTIENHANH){
                                return 'Đang thực hiện';
                            }
                            if($data->trang_thai==\app\models\CongViec::CV_COPHANHOI){
                                return 'Bị trả lại';
                            }
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} {cong-viec-hoan-thanh}',
                        'buttons'=>[
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['dieu-chinh','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,[
                                    'title'=>'Điều chỉnh công việc'
                                ]);
                            },
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['xem-tien-do','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,[
                                    'title'=>'Xem tiến độ công việc đã giao'
                                ]);
                            },
                            'cong-viec-hoan-thanh'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['hoan-thanh-cong-viec','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-check"></span>',$url,[
                                    'title'=>'Xác định công việc đã hoàn thành',
                                    'data-method'=>'post',
                                    'data-confirm'=>'Xác định công việc này đã hoàn thành?'
                                ]);
                            }
                        ],
                        'visibleButtons'=>[
                            'cong-viec-hoan-thanh'=>function($data){
                                if($data->trang_thai==CongViec::CV_HOANTHANH){
                                    return true;
                                }
                                return false;
                            },
                            'update'=>function($data){
                                if($data->trang_thai==CongViec::CV_HOANTHANH){
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
        </div>
    </div>
</div>
<div class="clearfix"></div>