<?php
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Danh sách CBCNV đã nghỉ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nghi-viec-index">
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
                    'ho_ten',
                    [
                        'attribute'=>'ngay_sinh',
                        'width'=>'100px',
                        'filter'=>\kartik\widgets\DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'ngay_sinh',
                            'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
                            'pluginOptions'=>[
                                'autoClose'=>true,
                                'format'=>'dd/mm/yyyy',
                            ]
                        ]),
                        'value'=>function($data){
                            if($data->ngay_sinh!=''||$data->ngay_sinh!=null){
                                return date("d/m/Y",strtotime($data->ngay_sinh));
                            }
                        }
                    ],
                    [
                        'attribute'=>'gioi_tinh',
                        'filter'=> array('1'=>'Nam','0'=>'Nữ'),
                        'value'=>function($data){
                            if($data->gioi_tinh==1){
                                return 'Nam';
                            } else {
                                return 'Nữ';
                            }
                        }
                    ],
                    [
                        'label'=>'Phòng ban',
                        'value'=>function($data){
                            if($phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_id])->count()>0){
                                $phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_id])->one();
                                return $phongBan->ten_day_du;
                            } else {
                                return '';
                            }
                        }
                    ],
                    [
                        'attribute'=>'chuc_vu_id',
                        'label'=>'Chức vụ',
                        'filter'=>\yii\helpers\ArrayHelper::map(\app\models\ChucVu::find()->all(),'id','ten_day_du'),
                        'value'=>function($data){
                            if(\app\models\ChucVu::find()->where(['id'=>$data->chuc_vu_id])->count()>0){
                                $chucVu=\app\models\ChucVu::find()->where(['id'=>$data->chuc_vu_id])->one();
                                return $chucVu->ten_day_du;
                            } else {
                                return '';
                            }
                        }
                    ],
                    [
                        'attribute'=>'trinh_do_chuyen_mon_id',
                        'label'=>'Trình độ',
                        'filter'=>\yii\helpers\ArrayHelper::map(\app\models\TrinhDoChuyenMon::find()->all(),'id','ten'),
                        'value'=>function($data){
                            if(\app\models\TrinhDoChuyenMon::find()->where(['id'=>$data->trinh_do_chuyen_mon_id])->count()>0){
                                $trinhDoChuyenMon=\app\models\TrinhDoChuyenMon::find()->where(['id'=>$data->trinh_do_chuyen_mon_id])->one();
                                return $trinhDoChuyenMon->ten;
                            } else {
                                return '';
                            }
                        }
                    ],
                    'chuyen_nghanh',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {hoan-tac}',
                        'buttons'=>[
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/nhan-su/xem-nghi-viec','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,[
                                    'title'=>'Xem hồ sơ nhân sự'
                                ]);
                            },
                            'hoan-tac'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/nhan-su/hoan-tac','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-plus"></span>',$url,[
                                    'title'=>'Chuyển lại làm việc',
                                    'data'=>['method'=>'post']
                                ]);
                            }
                        ]
                    ],
                ],
            ]);?>
        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>
<div class="clearfix"></div>