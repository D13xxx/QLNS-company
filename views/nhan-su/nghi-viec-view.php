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
                    'chuc_danh_id',
                    [
                            'attribute'=>'phong_ban_id',
                        'value'=>function($data){
                            $phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_id])->one();
                            return $phongBan->ten_day_du;
                        }
                    ],
                    'cong_viec_chinh',
                    'ngach_cong_chuc',
                    'ma_ngach',
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
                    [
                        'attribute'=>'ly_luan_chinh_tri_id',
                        'value'=>function($data){
                            if(\app\models\LyLuanChinhTri::find()->where(['id'=>$data->ly_luan_chinh_tri_id])->count()>0){
                                $lyLuanChinhTrinh=\app\models\LyLuanChinhTri::find()->where(['id'=>$data->ly_luan_chinh_tri_id])->one();
                                return $lyLuanChinhTrinh->ten;
                            }
                        }
                    ],
                    [
                            'attribute'=>'quan_ly_nha_nuoc_id',
                        'value'=>function($data){
                            if(\app\models\QuanLyNhaNuoc::find()->where(['id'=>$data->quan_ly_nha_nuoc_id])->count()>0){
                                $quanLyNhaNuoc=\app\models\QuanLyNhaNuoc::find()->where(['id'=>$data->quan_ly_nha_nuoc_id])->one();
                                return $quanLyNhaNuoc->ten;
                            }
                        }
                    ],
                    'ngoai_ngu',
                    'tin_hoc',
                    [
                            'attribute'=>'ngay_vao_dang',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_vao_dang));
                        }
                    ],
                    [
                            'attribute'=>'ngay_chinh_thuc',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_chinh_thuc));
                        }
                    ],
                    [
                            'attribute'=>'ngay_tham_gia_to_chuc_chinh_tri_xa_hoi',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi));
                        }
                    ],
                    'viec_lam_to_chuc_chinh_tri_xa_hoi',
                    [
                            'attribute'=>'ngay_nhap_ngu',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_nhap_ngu));
                        }
                    ],
                    [
                        'attribute'=>'ngay_xuat_ngu',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_xuat_ngu));
                        }
                    ],
                    'quan_ham',
                    'danh_hieu_phong_tang',
                    'so_truong_cong_tac',
                    'khen_thuong',
                    'nam_khen_thuong',
                    'ky_luat',
                    'nam_ky_luat',
                    'tinh_trang_suc_khoe',
                    'chieu_cao',
                    'can_nang',
                    'nhom_mau',
                    'hang_thuong_binh',
                    [
                            'attribute'=>'con_gia_dinh_chinh_sach_id',
                        'value'=>function($data){
                            if(\app\models\GiaDinhChinhSach::find()->where(['id'=>$data->con_gia_dinh_chinh_sach_id])->count()>0){
                                $conGiaDinhChinhSach=\app\models\GiaDinhChinhSach::find()->where(['id'=>$data->con_gia_dinh_chinh_sach_id])->one();
                                return $conGiaDinhChinhSach->ten;
                            }
                        }
                    ],
                    'so_chung_minh_nhan_dan',
                    [
                            'attribute'=>'ngay_cap',
                        'value'=>function($data){
                            return date("d/m/Y",strtotime($data->ngay_cap));
                        }
                    ],
                    'so_so_bhxh',
                    [
                            'attribute'=>'khai_ro_bi_bat_bi_tu',
                        'format'=>'html',
                    ],
                    [
                            'attribute'=>'tham_gia_to_chuc_nuoc_ngoai',
                        'format'=>'html',
                    ],
                    [
                            'attribute'=>'than_nhan_o_nuoc_ngoai',
                        'format'=>'html',
                    ]
                ],
            ]);

            $DaoTaoBoiDuong='<div class="col-sm-12"><div class="col-sm-2" style="text-align: center">';
            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                $DaoTaoBoiDuong=$DaoTaoBoiDuong. Html::img(Yii::getAlias("@web")."/images/nhan-su/macdinh.jpg",[
                    "style"=>["width"=>"140px","height"=>"180px"]
                ]);
            } else {
                $DaoTaoBoiDuong=$DaoTaoBoiDuong.Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                    'style'=>['width'=>'140px','height'=>'180px']
                ]);
            };
            $DaoTaoBoiDuong= $DaoTaoBoiDuong. '</div> <div class="col-sm-10">';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong. '<div class="form-group">';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<label class="col-sm-2 control-label for="nhansu-ho_ten">Họ tên</label>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<div class="col-sm-9"><input class="form-control" value="'.$model->ho_ten.'"></div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong . '</div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong. '<div class="form-group">';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<label class="col-sm-2 control-label">Ngày sinh</label>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<div class="col-sm-9"><input class="form-control" value="'.date("d/m/Y",strtotime($model->ngay_sinh)).'"></div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong . '</div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong. '<div class="form-group">';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<label class="col-sm-2 control-label">Quê quán</label>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'<div class="col-sm-9"><input class="form-control" value="'.$model->que_quan.'"></div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong . '</div>';
            $DaoTaoBoiDuong = $DaoTaoBoiDuong .'</div> </div> <div class="clearfix"></div> ';

            $DaoTaoBoiDuong = $DaoTaoBoiDuong. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Đào tạo, bồi dưỡng về chuyên môn nghiệp vụ
                            </h4>
                        </div>';
            $DaoTaoBoiDuong= $DaoTaoBoiDuong. '<div class="panel-body">';
            $DaoTaoBoiDuong= $DaoTaoBoiDuong. GridView::widget([
                                'dataProvider' => $dataDTBD,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute'=>'ten_truong',
                                        'label'=>'Tên cơ sở đào tạo',
                                    ],
                                    [
                                        'attribute'=>'chuyen_nganh',
                                        'label'=>'Chuyên ngành'
                                    ],
                                    [
                                        'attribute'=>'trinh_do_id',
                                        'label'=>'Trình độ',
                                        'value'=>function($data){
                                            $trinhDo=\app\models\TrinhDoChuyenMon::find()->where(['id'=>$data->trinh_do_id])->one();
                                            return $trinhDo->ten;
                                        }
                                    ],
                                    [
                                        'attribute'=>'tu_ngay',
                                        'label'=>'Bắt đầu',
                                        'value'=>function($data){
                                            return date("d/m/Y",strtotime($data->tu_ngay));
                                        }
                                    ],
                                    [
                                        'attribute'=>'den_ngay',
                                        'label'=>'Kết thúc',
                                        'value'=>function($data){
                                            return date("d/m/Y",strtotime($data->den_ngay));
                                        }
                                    ],
                                    [
                                        'attribute'=>'hinh_thuc_dao_tao',
                                        'label'=>'Hình thức',
                                    ],
                                    [
                                        'attribute'=>'van_bang',
                                        'label'=>'Văn bằng'
                                    ],
                                ],
                            ]);
            $DaoTaoBoiDuong= $DaoTaoBoiDuong. '</div> </div>';

            $QuaTrinhCongTac='<div class="col-sm-12"><div class="col-sm-2" style="text-align: center">';
            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                $QuaTrinhCongTac=$QuaTrinhCongTac. Html::img(Yii::getAlias("@web")."/images/nhan-su/macdinh.jpg",[
                        "style"=>["width"=>"140px","height"=>"180px"]
                    ]);
            } else {
                $QuaTrinhCongTac=$QuaTrinhCongTac.Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
            };
            $QuaTrinhCongTac= $QuaTrinhCongTac. '</div> <div class="col-sm-10">';
            $QuaTrinhCongTac = $QuaTrinhCongTac. '<div class="form-group">';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<label class="col-sm-2 control-label for="nhansu-ho_ten">Họ tên</label>';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<div class="col-sm-9"><input class="form-control" value="'.$model->ho_ten.'"></div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac . '</div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac. '<div class="form-group">';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<label class="col-sm-2 control-label">Ngày sinh</label>';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<div class="col-sm-9"><input class="form-control" value="'.date("d/m/Y",strtotime($model->ngay_sinh)).'"></div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac . '</div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac. '<div class="form-group">';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<label class="col-sm-2 control-label">Quê quán</label>';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'<div class="col-sm-9"><input class="form-control" value="'.$model->que_quan.'"></div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac . '</div>';
            $QuaTrinhCongTac = $QuaTrinhCongTac .'</div> </div> <div class="clearfix"></div> ';
            $QuaTrinhCongTac = $QuaTrinhCongTac. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Quá trình công tác
                            </h4>
                        </div>';
            $QuaTrinhCongTac= $QuaTrinhCongTac. '<div class="panel-body">';
            $QuaTrinhCongTac= $QuaTrinhCongTac. GridView::widget([
                                    'dataProvider' => $dataQTCT,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'attribute'=>'tu_ngay',
                                            //'label'=>'Bắt đầu',
                                            'value'=>function($data){
                                                return date("d/m/Y",strtotime($data->tu_ngay));
                                            }
                                        ],
                                        [
                                            'attribute'=>'den_ngay',
                                            //'label'=>'Kết thúc',
                                            'value'=>function($data){
                                                return date("d/m/Y",strtotime($data->den_ngay));
                                            }
                                        ],
                                        [
                                            'attribute'=>'chuc_vu_id',
                                            'label'=>'Chức vụ',
                                            'value'=>function($data){
                                                $chucVu=\app\models\ChucVu::find()->where(['id'=>$data->chu_vu_id])->one();
                                                return $chucVu->ten_day_du;
                                            }
                                        ],
                                        [
                                            'attribute'=>'chuc_danh',
                                        ],
                                        [
                                            'attribute'=>'qua_trinh_cong_tac',
                                            'format'=>'html',
                                            'contentOptions'=>[
                                                'style'=>[
                                                    'max-width'=>'400px',
                                                    'overflow'=>'scroll',
                                                    'word-wrap'=>'break-word',
                                                    'white-space'=>'pre-line',
                                                ]
                                            ]
                                        ],
                                        'bien_che',
                                    ],
                                ]);
            $QuaTrinhCongTac= $QuaTrinhCongTac. '</div> </div>';

            //Quan hệ gia đình
            $QuanHeGiaDinh='<div class="col-sm-12"><div class="col-sm-2" style="text-align: center">';
            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                $QuanHeGiaDinh=$QuanHeGiaDinh. Html::img(Yii::getAlias("@web")."/images/nhan-su/macdinh.jpg",[
                        "style"=>["width"=>"140px","height"=>"180px"]
                    ]);
            } else {
                $QuanHeGiaDinh=$QuanHeGiaDinh.Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
            };
            $QuanHeGiaDinh= $QuanHeGiaDinh. '</div> <div class="col-sm-10">';
            $QuanHeGiaDinh = $QuanHeGiaDinh. '<div class="form-group">';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<label class="col-sm-2 control-label for="nhansu-ho_ten">Họ tên</label>';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<div class="col-sm-9"><input class="form-control" value="'.$model->ho_ten.'"></div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh . '</div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh. '<div class="form-group">';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<label class="col-sm-2 control-label">Ngày sinh</label>';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<div class="col-sm-9"><input class="form-control" value="'.date("d/m/Y",strtotime($model->ngay_sinh)).'"></div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh . '</div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh. '<div class="form-group">';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<label class="col-sm-2 control-label">Quê quán</label>';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'<div class="col-sm-9"><input class="form-control" value="'.$model->que_quan.'"></div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh . '</div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh .'</div> </div> <div class="clearfix"></div> ';
            $QuanHeGiaDinh = $QuanHeGiaDinh. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                a) Về bản thân: Cha, Mẹ, Vợ (hoặc chồng), các con, anh chị em ruột 
                            </h4>
                        </div>';
            $QuanHeGiaDinh= $QuanHeGiaDinh. '<div class="panel-body">';
            $QuanHeGiaDinh= $QuanHeGiaDinh. GridView::widget([
                                    'dataProvider' => $dataQHGDBT,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'attribute'=>'moi_quan_he_id',
                                            'value'=>function($data){
                                                $moiQuanHe=\app\models\MoiQuanHeGiaDinh::find()->where(['id'=>$data->moi_quan_he_id])->one();
                                                return $moiQuanHe->ten;
                                            },
                                        ],
                                        [
                                            'attribute'=>'ho_ten',
                                        ],
                                        [
                                            'attribute'=>'nam_sinh',
                                        ],
                                        [
                                            'attribute'=>'tom_tat_ly_lich_cong_viec',
                                            'format'=>'html',
                                            'contentOptions'=>[
                                                'style'=>[
                                                    'max-width'=>'400px',
                                                    'overflow'=>'scroll',
                                                    'word-wrap'=>'break-word',
                                                    'white-space'=>'pre-line',
                                                ]
                                            ]
                                        ],
                                    ],
                                ]);
            $QuanHeGiaDinh= $QuanHeGiaDinh. '</div> </div>';
            $QuanHeGiaDinh = $QuanHeGiaDinh. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                b) Về bên Vợ (hoặc chồng): Cha, Mẹ, anh chị em ruột  
                            </h4>
                        </div>';
            $QuanHeGiaDinh= $QuanHeGiaDinh. '<div class="panel-body">';
            $QuanHeGiaDinh= $QuanHeGiaDinh. GridView::widget([
                                    'dataProvider' => $dataVoChong,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'attribute'=>'moi_quan_he_id',
                                            'value'=>function($data){
                                                $moiQuanHe=\app\models\MoiQuanHeGiaDinh::find()->where(['id'=>$data->moi_quan_he_id])->one();
                                                return $moiQuanHe->ten;
                                            },
                                        ],
                                        [
                                            'attribute'=>'ho_ten',
                                        ],
                                        [
                                            'attribute'=>'nam_sinh',
                                        ],
                                        [
                                            'attribute'=>'tom_tat_ly_lich_cong_tac',
                                            'format'=>'html',
                                            'contentOptions'=>[
                                                'style'=>[
                                                    'max-width'=>'400px',
                                                    'overflow'=>'scroll',
                                                    'word-wrap'=>'break-word',
                                                    'white-space'=>'pre-line',
                                                ]
                                            ]
                                        ],

                                    ],
                                ]);
            $QuanHeGiaDinh= $QuanHeGiaDinh. '</div> </div>';

            //Quá trình lương
            $QuaTrinhLuong='<div class="col-sm-12"><div class="col-sm-2" style="text-align: center">';
            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                $QuaTrinhLuong=$QuaTrinhLuong. Html::img(Yii::getAlias("@web")."/images/nhan-su/macdinh.jpg",[
                        "style"=>["width"=>"140px","height"=>"180px"]
                    ]);
            } else {
                $QuaTrinhLuong=$QuaTrinhLuong.Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
            };
            $QuaTrinhLuong= $QuaTrinhLuong. '</div> <div class="col-sm-10">';
            $QuaTrinhLuong = $QuaTrinhLuong. '<div class="form-group">';
            $QuaTrinhLuong = $QuaTrinhLuong .'<label class="col-sm-2 control-label for="nhansu-ho_ten">Họ tên</label>';
            $QuaTrinhLuong = $QuaTrinhLuong .'<div class="col-sm-9"><input class="form-control" value="'.$model->ho_ten.'"></div>';
            $QuaTrinhLuong = $QuaTrinhLuong . '</div>';
            $QuaTrinhLuong = $QuaTrinhLuong. '<div class="form-group">';
            $QuaTrinhLuong = $QuaTrinhLuong .'<label class="col-sm-2 control-label">Ngày sinh</label>';
            $QuaTrinhLuong = $QuaTrinhLuong .'<div class="col-sm-9"><input class="form-control" value="'.date("d/m/Y",strtotime($model->ngay_sinh)).'"></div>';
            $QuaTrinhLuong = $QuaTrinhLuong . '</div>';
            $QuaTrinhLuong = $QuaTrinhLuong. '<div class="form-group">';
            $QuaTrinhLuong = $QuaTrinhLuong .'<label class="col-sm-2 control-label">Quê quán</label>';
            $QuaTrinhLuong = $QuaTrinhLuong .'<div class="col-sm-9"><input class="form-control" value="'.$model->que_quan.'"></div>';
            $QuaTrinhLuong = $QuaTrinhLuong . '</div>';
            $QuaTrinhLuong = $QuaTrinhLuong .'</div> </div> <div class="clearfix"></div> ';
            $QuaTrinhLuong = $QuaTrinhLuong. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Diễn biến quá trình lương của cán bộ, công chức
                            </h4>
                        </div>';
            $QuaTrinhLuong= $QuaTrinhLuong. '<div class="panel-body">';
            $QuaTrinhLuong= $QuaTrinhLuong. GridView::widget([
                                    'dataProvider' => $dataLuong,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'attribute'=>'ngach_cong_chu',
                                        ],
                                        [
                                            'attribute'=>'ma_ngach',
                                        ],
                                        [
                                            'attribute'=>'bac_luong',
                                        ],
                                        [
                                            'attribute'=>'he_so_luong',
                                        ],
                                        [
                                            'attribute'=>'muc_huong',
                                        ],
                                        [
                                            'attribute'=>'ngay_thang',
                                            'value'=>function($data){
                                                return date("d/m/Y",strtotime($data->ngay_thang));
                                            },
                                        ],
                                        [
                                            'attribute'=>'loai_nang_luong',
                                        ],
                                        [
                                            'attribute'=>'so_quyet_dinh',
                                        ],
                                    ],
                                ]);
            $QuaTrinhLuong= $QuaTrinhLuong. '</div> </div>';
            $QuaTrinhLuong = $QuaTrinhLuong. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Diễn biến quá trình phụ cấp của cán bộ, công chức  
                            </h4>
                        </div>';
            $QuaTrinhLuong= $QuaTrinhLuong. '<div class="panel-body">';
            $QuaTrinhLuong= $QuaTrinhLuong. GridView::widget([
                                    'dataProvider' => $dataPC,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'attribute'=>'ten',
                                        ],
                                        [
                                            'attribute'=>'muc_huong',
                                        ],
                                        [
                                            'attribute'=>'tu_ngay',
                                            'value'=>function($data){
                                                if($data->tu_ngay!=''||$data->tu_ngay!=null){
                                                    return date("d/m/Y",strtotime($data->tu_ngay));
                                                } else {
                                                    return '';
                                                }
                                            }
                                        ],
                                        [
                                            'attribute'=>'den_ngay',
                                            'value'=>function($data){
                                                if($data->den_ngay!=''||$data->den_ngay!=null){
                                                    return date("d/m/Y",strtotime($data->den_ngay));
                                                } else {
                                                    return '';
                                                }
                                            }
                                        ],
                                        [
                                            'attribute'=>'so_quyet_dinh',
                                        ],

                                    ],
                                ]);
            $QuaTrinhLuong= $QuaTrinhLuong. '</div> </div>';

            //Khen Thưởng kỷ luật
            $KhenThuongKyLuat='<div class="col-sm-12"><div class="col-sm-2" style="text-align: center">';
            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                $KhenThuongKyLuat=$KhenThuongKyLuat. Html::img(Yii::getAlias("@web")."/images/nhan-su/macdinh.jpg",[
                        "style"=>["width"=>"140px","height"=>"180px"]
                    ]);
            } else {
                $KhenThuongKyLuat=$KhenThuongKyLuat.Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                        'style'=>['width'=>'140px','height'=>'180px']
                    ]);
            };
            $KhenThuongKyLuat= $KhenThuongKyLuat. '</div> <div class="col-sm-10">';
            $KhenThuongKyLuat = $KhenThuongKyLuat. '<div class="form-group">';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<label class="col-sm-2 control-label for="nhansu-ho_ten">Họ tên</label>';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<div class="col-sm-9"><input class="form-control" value="'.$model->ho_ten.'"></div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat . '</div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat. '<div class="form-group">';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<label class="col-sm-2 control-label">Ngày sinh</label>';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<div class="col-sm-9"><input class="form-control" value="'.date("d/m/Y",strtotime($model->ngay_sinh)).'"></div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat . '</div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat. '<div class="form-group">';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<label class="col-sm-2 control-label">Quê quán</label>';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'<div class="col-sm-9"><input class="form-control" value="'.$model->que_quan.'"></div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat . '</div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat .'</div> </div> <div class="clearfix"></div> ';
            $KhenThuongKyLuat = $KhenThuongKyLuat. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Khen thưởng
                            </h4>
                        </div>';
            $KhenThuongKyLuat= $KhenThuongKyLuat. '<div class="panel-body">';
            $KhenThuongKyLuat= $KhenThuongKyLuat. GridView::widget([
                    'dataProvider' => $dataKT,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute'=>'ngay_thang',
                            'value'=>function($data){
                                return date("d/m/Y",strtotime($data->ngay_thang));
                            },
                        ],
                        [
                            'attribute'=>'so_quyet_dinh',
                        ],
                        [
                            'attribute'=>'noi_dung',
                            'format'=>'html',
                            'contentOptions'=>[
                                'style'=>[
                                    'max-width'=>'450px',
                                    'overflow'=>'scroll',
                                    'word-wrap'=>'break-word',
                                    'white-space'=>'pre-line',
                                ]
                            ]
                        ],
                        [
                            'attribute'=>'hinh_thuc',
                        ],
                        [
                            'attribute'=>'cap_khen_thuong',
                        ],
                    ],
                ]);
            $KhenThuongKyLuat= $KhenThuongKyLuat. '</div> </div>';
            $KhenThuongKyLuat = $KhenThuongKyLuat. '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Kỷ luật
                            </h4>
                        </div>';
            $KhenThuongKyLuat= $KhenThuongKyLuat. '<div class="panel-body">';
            $KhenThuongKyLuat= $KhenThuongKyLuat. GridView::widget([
                    'dataProvider' => $dataKL,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute'=>'ngay_thang',
                            'value'=>function($data){
                                return date("d/m/Y",strtotime($data->ngay_thang));
                            },
                        ],
                        [
                            'attribute'=>'so_quyet_dinh',
                        ],
                        [
                            'attribute'=>'noi_dung',
                            'format'=>'html',
                            'contentOptions'=>[
                                'style'=>[
                                    'max-width'=>'450px',
                                    'overflow'=>'scroll',
                                    'word-wrap'=>'break-word',
                                    'white-space'=>'pre-line',
                                ]
                            ]
                        ],
                        [
                            'attribute'=>'hinh_thuc',
                        ],
                        [
                            'attribute'=>'cap_quyet_dinh',
                        ],

                    ],
                ]);
            $KhenThuongKyLuat= $KhenThuongKyLuat. '</div> </div>';

            $items = [
                [
                    'label'=>'Thông tin chung',
                    'content'=>$ThongTinChung,
                    'active'=>true
                ],
                [
                    'label'=>'Đào tạo bồi dưỡng',
                    'content'=>$DaoTaoBoiDuong,
                    'active'=>false
                ],
                [
                    'label'=>'Quá trình công tác',
                    'content'=>$QuaTrinhCongTac,
                    'active'=>false
                ],
                [
                    'label'=>'Quan hệ gia đình',
                    'content'=>$QuanHeGiaDinh,
                    'active'=>false
                ],
                [
                    'label'=>'Quá trình lương',
                    'content'=>$QuaTrinhLuong,
                    'active'=>false
                ],
                [
                    'label'=>'Khen thưởng kỷ luật',
                    'content'=>$KhenThuongKyLuat,
                    'active'=>false
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