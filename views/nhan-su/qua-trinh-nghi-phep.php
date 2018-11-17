<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuaTrinhDaoTaoBoiDuongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quá trình nghỉ phép';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="qua-trinh-nghi-phep-index">
        <?php $form = ActiveForm::begin([
            'options'=>['class'=>'form-horizontal','enctype'=>'multipart/form-data'],
            'fieldConfig'=>[
                'template' => "{label}\n<div class=\"col-sm-9\">{input}</div><div class=\"col-sm-3\"></div>\n<div class=\"col-sm-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-3 control-label'],
            ],
        ]); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?= Html::encode($this->title)?>
                </h4>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= Html::a('Thông tin chung',['/nhan-su/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                        <?= Html::a('Đào tạo bồi dưỡng',['/nhan-su/qua-trinh-dao-tao-boi-duong','id'=>$model->id],['class'=>'btn btn-default'])?>
                        <?= Html::a('Quá trình công tác',['/nhan-su/qua-trinh-cong-tac','id'=>$model->id],['class'=>'btn btn-default'])?>
                        <?= Html::a('Nghỉ phép',['/nhan-su/qua-trinh-nghi-phep','id'=>$model->id],['class'=>'btn btn-default'])?>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-1" style="text-align: center">
                            <?php
                            if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                                echo Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                                    'style'=>['width'=>'140px','height'=>'180px']
                                ]);
                            } else {
                                echo Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                                    'style'=>['width'=>'140px','height'=>'180px']
                                ]);
                            }
                            ?>
                        </div>
                        <div class="col-sm-11">
                            <?=$form->field($model,'ho_ten')->textInput(['readOnly'=>true]);?>
                            <?= $form->field($model,'ngay_sinh')->textInput(['value'=>date("d/m/Y",strtotime($model->ngay_sinh)),'readOnly'=>true]);?>
                            <?= $form->field($model,'que_quan')->textInput(['readOnly'=>true]);?>
                        </div>
                        <div>&nbsp;</div>
                        <div class="clearfix"></div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Diễn biến nghỉ phép
                                    <?= Html::button('<span class="fa fa-plus"></span> Thêm mới',
                                        [
                                            'value'=>\yii\helpers\Url::to(['/nhan-su/them-nghi-phep','id'=>$model->id]),
                                            'id'=> 'modalButton',
                                            'class' => 'btn btn-success btn-xs pull-right ',
                                        ]
                                    );?>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                Pjax::begin(['id'=>'luoi-du-lieu-id']);
                                $nhanvienID=$model->id;
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    //'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        [
                                            'label'=>'Tên',
                                            'filter'=>\kartik\select2\Select2::widget([
                                                'model'=>$searchModel,
                                                'attribute'=>'loai_hinh_nghi_phep_id',
                                                'data'=>\yii\helpers\ArrayHelper::map(\app\models\LoaiHinhNghiPhep::find()->where(['trang_thai'=>1])->all(),'id','ten'),
                                                'options'=>['prompt'=>''],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ]),
                                            'value'=>function($data){
                                                $loaiHinhNghiPhep=\app\models\LoaiHinhNghiPhep::find()->where(['id'=>$data->loai_hinh_nghi_phep_id])->one();
                                                return $loaiHinhNghiPhep->ten;
                                            }
                                        ],
                                        [
                                            'label'=>'Lý do',
                                            'value'=>function($data){
                                                return $data->ly_do;
                                            }
                                        ],
                                        [
                                            'attribute'=>'tu_ngay',
                                            'label'=>'Từ ngày',
                                            'value'=>function($data){
                                                return date("d/m/Y",strtotime($data->tu_ngay));
                                            }
                                        ],
                                        [
                                            'attribute'=>'den_ngay',
                                            'label'=>'Đến ngày',
                                            'value'=>function($data){
                                                return date("d/m/Y",strtotime($data->den_ngay));
                                            }
                                        ],

                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template'=>'{update} {delete}',
                                            'buttons'=>[
                                                'update'=>function($url,$data) {
                                                    $url=\yii\helpers\Url::to(['/nhan-su/sua-nghi-phep','id'=>$data->id]);
                                                    return Html::button(Icon::show('pencil'),
                                                        [
                                                            'value'=>$url,
                                                            'class'=> 'modalButton1 grid-action btn btn-success',
                                                            'data-toggle'=>'tooltip',
                                                            'data-placement'=>'bottom',
                                                            'title'=>'Chinh sua'
                                                        ]);
                                                },
                                                'delete'=>function($url,$data){
                                                    $url=\yii\helpers\Url::to(['/nhan-su/xoa-nghi-phep','id'=>$data->id,'nhanvien'=>$data->nhan_su_id]);
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                                                        'data'=>[
                                                            'method'=>'post',
                                                            'confirm'=>'Bạn có muốn xóa dữ liệu này hay không?'
                                                        ],
                                                        'title'=>'Xóa quá trình'
                                                    ]);
                                                }
                                            ]
                                        ],
                                    ],
                                ]); ?>
                                <?php Pjax::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/nhan-su/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/nhan-su/index'],['class'=>'btn btn-default pull-right'])?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="clearfix"></div>
<?php
\yii\bootstrap\Modal::begin([
    'id' => 'userModal',
    'header' => '<h4 style="text-align: center">Quá trình nghỉ phép</h4>',
]);
?>
    <div id ="modalContent">

    </div>
<?php \yii\bootstrap\Modal::end();?>

<?php
$script= <<<JS
$(function(){
      $('#modalButton').click(function(){
          $('#userModal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
      });
  });
$(function(){
      $('.modalButton1').click(function(){
          $('#userModal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
      });
  });
JS;
$this->registerJs($script,yii\web\view::POS_READY);
?>