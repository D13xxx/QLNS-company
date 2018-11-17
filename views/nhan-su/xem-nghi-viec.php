<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\widgets\DetailView;

?>
<div class="nghi-viec-view">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Thông tin chi tiết
            </h4>
        </div>
        <div class="panel-body">
            <?php
            $ThongTinChung= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute'=>'anh_nhan_vien',
                        'format'=>'raw',
                        'value'=>function($data){
                            if($data->anh_nhan_vien==''||$data->anh_nhan_vien==null){
                                return Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                                    'style'=>['width'=>'140px','height'=>'180px']
                                ]);
                            } else {
                                return Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$data->anh_nhan_vien,[
                                    'style'=>['width'=>'140px','height'=>'180px']
                                ]);
                            }
                        }
                    ],
                    'ho_ten',
                    'ten_khac',
                    [
                        'attribute'=>'ngay_sinh',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_sinh));
                        }
                    ],
                    [
                        'attribute'=>'gioi_tinh',
                        'value'=>function($data){
                            if($data->gioi_tinh==1){
                                return 'Nam';
                            } else { return 'Nữ';}
                        }
                    ],
                    'que_quan',
                    [
                        'attribute'=>'dan_toc_id',
                        'value'=>function($data){
                            $danToc= \app\models\DanToc::find()->where(['id'=>$data->dan_toc_id])->one();
                            return $danToc->ten;
                        }
                    ],
                    [
                        'attribute'=>'ton_giao_id',
                        'value'=>function($data){
                            $tonGiao=\app\models\TonGiao::find()->where(['id'=>$data->ton_giao_id])->one();
                            return $tonGiao->ten;
                        }
                    ],
                    'ho_khau_thuong_tru',
                    'noi_o_hien_nay',
                    'nghe_nghiep_khi_tuyen',
                    [
                        'attribute'=>'ngay_tuyen_dung',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_tuyen_dung));
                        }
                    ],
                    'co_quan_tuyen_dung',
                    [
                        'attribute'=>'chuc_vu_id',
                        'value'=>function($data){
                            $chucVu=\app\models\ChucVu::find()->where(['id'=>$data->chuc_vu_id])->one();
                            return $chucVu->ten_day_du;
                        }
                    ],
                    [
                            'attribute'=>'phong_ban_id',
                        'value'=>function($data){
                            $phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_id])->one();
                            return $phongBan->ten_day_du;
                        }
                    ],
                    'cong_viec_chinh',
                    'bac_luong',
                    'he_so',
                    [
                            'attribute'=>'ngay_huong',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_huong));
                        }
                    ],
                    'phu_cap_chuc_vu',
                    'phu_cap_khac',
                    'trinh_do_pho_thong',
                    [
                            'attribute'=>'trinh_do_chuyen_mon_id',
                        'value'=>function($data){
                            if(\app\models\TrinhDoChuyenMon::find()->where(['id'=>$data->trinh_do_chuyen_mon_id])->count()>0){
                                $trinhDoChuyenMon=\app\models\TrinhDoChuyenMon::find()->where(['id'=>$data->trinh_do_chuyen_mon_id])->one();
                                return $trinhDoChuyenMon->ten;
                            }
                        }
                    ],
                    'chuyen_nghanh',
                    'ngoai_ngu',
                    'tin_hoc',
                    'so_chung_minh_nhan_dan',
                    [
                            'attribute'=>'ngay_cap',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_cap));
                        }
                    ],
                    'so_so_bhxh',
                ],
            ]);

            $items = [
                [
                    'label'=>'Thông tin chung',
                    'content'=>$ThongTinChung,
                    'active'=>true
                ],
            ];
            echo TabsX::widget([
                'items'=>$items,
                'position'=>TabsX::POS_ABOVE,
                'encodeLabels'=>false
            ]);
            ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Chuyển làm việc',['/nhan-su/hoan-tac','id'=>$model->id],[
                'class'=>'btn btn-warning',
                'data'=>['method'=>'post']
            ])?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/nhan-su/danh-muc-nghi-viec'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
</div>
<div class="clearfix"></div>