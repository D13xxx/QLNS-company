<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\XaPhuongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục Phường Xã';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xa-phuong-index">

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
                'hover'=>true,
                //'showPageSummary'=>true,
                'columns' => [
                    ['class'=>'kartik\grid\SerialColumn'],
                    'ma',
                    'ten',
                    [
                        'attribute'=>'tinh_thanh_id',
                        'value'=>function($data){
                            $tinhThanh=\app\models\TinhThanh::find()->where(['id'=>$data->tinh_thanh_id])->one();
                            return $tinhThanh->ten;
                        },
                        'group'=>true,  // enable grouping,
                        'groupedRow'=>true,                    // move grouped column to a single grouped row
                        'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                        'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
                    ],
                    [
                        'attribute'=>'quan_huyen_id',
                        'filter'=>\kartik\select2\Select2::widget([
                            'model'=>$searchModel,
                            'attribute'=>'quan_huyen_id',
                            'data'=>\yii\helpers\ArrayHelper::map(\app\models\QuanHuyen::find()->all(),'id','ten'),
                            'pluginOptions'=>['allowClear'=>true],
                            'options'=>['placeholder'=>''],
                        ]),
                        'value'=>function($data){
                            $quanHuyen=\app\models\QuanHuyen::find()->where(['id'=>$data->quan_huyen_id])->one();
                            return $quanHuyen->ten;
                        },
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template'=>'{view} {update} ',
                        'buttons'=>[
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/xem-xa-phuong','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>'Xem chi tiết']);
                            },
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/sua-xa-phuong','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>'Sửa thông tin']);
                            },
                            
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-xa-phuong'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
