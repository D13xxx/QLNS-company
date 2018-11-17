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
                            'columns'=>[
                                ['class'=>'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'noi_dung',
                                    'format'=>'html',
                                ],
                                [
                                    'attribute'=>'ngay_lap',
                                    'value'=>function($data){
                                        return date("d/m/Y",strtotime($data->ngay_lap));
                                    }
                                ],
                                [
                                    'attribute'=>'tien_do',
                                    'contentOptions'=>['style'=>'text-align:right'],
                                    'value'=>function($data){
                                        if($data->tien_do==''||$data->tien_do==null){
                                            return '0%';
                                        } else {
                                            return $data->tien_do.'%';
                                        }
                                    }
                                ],
                                [
                                    'label'=>'Đánh giá',
                                    'format'=>'html',
                                    'value'=>function($data){
                                        if(\app\models\CongViecDanhGia::find()->where(['cong_viec_tien_do_id'=>$data->id])->count()>0){
                                            $searchDanhGia=new \app\models\CongViecDanhGiaSearch();
                                            $dataDanhGia= $searchDanhGia->search(Yii::$app->request->queryParams);
                                            $dataDanhGia->query->andFilterWhere(['cong_viec_tien_do_id'=>$data->id]);
                                            return GridView::widget([
                                                'dataProvider'=>$dataDanhGia,
                                                'summary'=>'',
                                                'columns'=>[
                                                    ['class'=>'yii\grid\SerialColumn'],
                                                    [
                                                        'attribute'=>'noi_dung',
                                                        'format'=>'html',
                                                    ],
                                                    [
                                                        'attribute'=>'ngay_lap',
                                                        'value'=>function($data){
                                                            return date("d/m/Y",strtotime($data->ngay_lap));
                                                        }
                                                    ],
                                                ]
                                            ]);
                                        } else {
                                            return '';
                                        }
                                    }
                                ],
                                [
                                    'label'=>'Đính kèm',
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
                <?php $form = ActiveForm::begin([
                    'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
                    'fieldConfig'=>[
                        'template' => "{label}\n<div class=\"col-sm-10\">{input}</div><div class=\"col-sm-2\"></div>\n<div class=\"col-sm-9\">{error}</div>",
                        'labelOptions' => ['class' => 'col-sm-2 control-label'],
                    ],
                ]); ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thêm tiến độ</h4>
                    </div>
                    <div class="panel-body">
                        <?= $form->field($modelTienDo, 'noi_dung')->widget(\dosamigos\tinymce\TinyMce::className(),[
                            'options' => ['rows' => 12],
                            'language' => 'vi',
                            'clientOptions' => [
                                'branding'=> false,
                                'plugins' => $plugin,
                                'toolbar' => $toolbar,
                                'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
                            ]
                        ]) ?>
                        <?= $form->field($modelTienDo,'tien_do')->textInput()?>

                        <?= $form->field($modelTienDo,'tep_dinh_kem')->widget(\kartik\file\FileInput::className(),[
                            'options'=>['accept'=>['*']],
                            'pluginOptions'=>[
                                'allowedFileExtensions'=>['jpg','jpeg','bmp','png','gif','doc','docx','xls','xlsx','pdf'],
                                'showUpload'=>false,
                                'showPreview'=>false,
                                'browseLabel' =>  'Chọn tệp tin'
                            ]
                        ])?>

                    </div>
                    <div class="panel-footer" style="text-align: center">
                        <?= Html::submitButton('<span class="fa fa-check"></span> Hoàn thành' , ['class' => 'btn btn-primary' ]) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

            <div class="panel-footer">
                <?= Html::a('<span class = "fa fa-check"></span> Ban giao việc',['ban-giao-cong-viec','id'=>$modelCongViec->id],[
                    'class'=>'btn btn-success',
                    'data-method'=>['post'],
                    'data-confirm'=>'Bạn có chắc đã hoàn thành công việc?'
                ])?>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['cong-viec-duoc-giao'],['class'=>'btn btn-default pull-right'])?>
            </div>

        </div>
</div>
<div class="clearfix"></div>