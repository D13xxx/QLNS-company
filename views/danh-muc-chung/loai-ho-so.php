<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\LoaiHinhNghiPhepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loại hồ sơ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-hinh-nghi-phep-index">

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
                    'id',
                    'ma',
                    'ten',
                    [
                        'attribute'=>'trang_thai',
                        'filter'=>array('1'=>'Hoạt động','0'=>'Không hoạt động'),
                        'value'=>function($data){
                            if($data->trang_thai==1)
                            {
                                return 'Hoạt động';
                            } else {
                                return 'Không hoạt động';
                            }
                        }
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} ',
                        'buttons'=>[
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/xem-loai-ho-so','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>'Xem chi tiết']);
                            },
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/sua-loai-ho-so','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>'Sửa thông tin']);
                            },
                            
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-loai-ho-so'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
