<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CongViec;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CongViecSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục công việc';
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
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} {delete}',
                        'buttons'=>[
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['dieu-chinh','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,[
                                    'title'=>'Điều chỉnh công việc'
                                ]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['tao-cong-viec'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
