<?php
use kartik\grid\GridView;

$searchModel= New \app\models\NhanSuSearch();
$dataProvider= $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->andFilterWhere(['phong_ban_id'=>$phong_ban_id]);
$dataProvider->query->andWhere(['nghi_viec'=>0]);
//$dataProvider->query->orderBy(['chuc_vu_id'=>SORT_DESC]);
$dataProvider->pagination->pageSize=10;

echo GridView::widget([
//    'id'=>'du_lieu',
    'summary'=>'',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'ho_ten',
        [
            'attribute'=>'ngay_sinh',
            'width'=>'100px',
            'filter'=>\yii\jui\DatePicker::widget([
                'model'=>$searchModel,
                'attribute'=>'ngay_sinh',
                'dateFormat'=>'dd/mm/yyyy',
                'options'=>['class'=>'form-control']
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
            'template'=>'{update} {create-use} {view} {phan_quyen}',
            'buttons'=>[
                'create-use'=>function($url,$data){
                    $url=\yii\helpers\Url::to(['/nhan-su/tao-tai-khoan','id'=>$data->id]);
                    return \yii\helpers\Html::a('<span class="glyphicon glyphicon-user"></span>',$url,[
                        'title'=>'Tạo tài khoản'
                    ]);
                },
                'phan_quyen'=>function($url,$data){
                    $url=\yii\helpers\Url::to(['/admin/assignment/view','id'=>$data->user_id]);
                    return \yii\helpers\Html::a('<i class="glyphicon glyphicon-cog"></i>',$url,[
                        'title'=>'Phân quyền người dùng'
                    ]);
                },
            ],
            'visibleButtons'=>[
                'create-use'=>function($data){
                    if($data->user_id != '' || $data->user_id != null){
                        return false;
                    } else {
                        return true;
                    }
                },
                'phan_quyen'=> function($data){
                    if($data->user_id !='' || $data->user_id != null)
                    {
                        return true;
                    } else {
                        return false;
                    }
                }
            ]
        ],
    ],
]);

?>