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
    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
        'fieldConfig'=>[
            'template' => "{label}\n<div class=\"col-sm-10\">{input}</div><div class=\"col-sm-2\"></div>\n<div class=\"col-sm-9\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Đánh giá tiến độ công việc
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
                    <h4 class="panel-title">Tiến độ công việc</h4>
                </div>
                <div class="panel-body">
                    <?= GridView::widget([
                        'summary'=>'',
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
                                'value'=>function($data){
                                    return $data->tien_do.'%';
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
                                        return "";
                                    }

                                }
                            ],
                        ]
                    ])?>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Thêm đánh giá mới</h4>
                </div>
                <div class="panel-body">
                    <?= $form->field($modelTraLai, 'ly_do_tra_lai')->widget(\dosamigos\tinymce\TinyMce::className(),[
                        'options' => ['rows' => 12],
                        'language' => 'vi',
                        'clientOptions' => [
                            'branding'=> false,
                            'plugins' => $plugin,
                            'toolbar' => $toolbar,
                            'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(['elfinder/tinymce']),
                        ]
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <?= Html::submitButton('<span class="fa fa-check"></span> Trả lại công việc' , ['class' => 'btn btn-warning' ]) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['da-hoan-thanh'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
