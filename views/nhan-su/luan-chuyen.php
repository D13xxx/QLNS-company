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

$this->title = 'Luân chuyển cán bộ';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="luan-chuyen-can-bo-index">
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
                                Dách sách luân chuyển
                                <?= Html::button('<span class="fa fa-plus"></span> Thêm mới',
                                    [
                                        'value'=>\yii\helpers\Url::to(['/nhan-su/them-luan-chuyen','id'=>$model->id]),
                                        'id'=> 'modalButton',
                                        'class' => 'btn btn-success btn-xs pull-right ',
                                    ]
                                );?>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            $nhanvienID=$model->id;
                            ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataLuanChuyen,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute'=>'phong_ban_cu',
                                        'value'=>function($data){
                                            $phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_cu])->one();
                                            return $phongBan->ten_day_du;
                                        }
                                    ],
                                    [
                                        'attribute'=>'phong_ban_moi',
                                        'value'=>function($data){
                                            $phongBan=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_moi])->one();
                                            return $phongBan->ten_day_du;
                                        }
                                    ],
                                    [
                                        'attribute'=>'ngay_ap_dung',
                                        'value'=>function($data){
                                            return date("d/m/Y",strtotime($data->ngay_ap_dung));
                                        }
                                    ],
                                    [
                                        'attribute'=>'so_quyet_dinh',
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template'=>'{update} {delete}',
                                        'buttons'=>[
                                            'update'=>function($url,$data) {
                                                $url=\yii\helpers\Url::to(['/nhan-su/sua-luan-chuyen','id'=>$data->id]);
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
                                                $url=\yii\helpers\Url::to(['/nhan-su/xoa-luan-chuyen','id'=>$data->id,'nhanvien'=>$data->nhan_su_id]);
                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                                                    'data'=>[
                                                        'method'=>'post',
                                                        'confirm'=>'Bạn có muốn xóa dữ liệu này hay không?'
                                                    ],
                                                    'title'=>'Xóa dữ liệu'
                                                ]);
                                            }
                                        ]
                                    ],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['/nhan-su/luan-chuyen-can-bo'],['class'=>'btn btn-default'])?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="clearfix"></div>
<?php
\yii\bootstrap\Modal::begin([
    'id' => 'userModal',
    'header' => '<h4 style="text-align: center">Luân chuyển cán bộ, công chức</h4>',
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