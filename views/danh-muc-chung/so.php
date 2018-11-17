<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChucVuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục sổ văn bản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chuc-vu-index">

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
//                    'id',
                    'ten',
                    'nam',
//                    'nhom_so_id',
                    [
                        'attribute'=>'nhom_so_id',
                        'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                        'filter'=>\yii\helpers\ArrayHelper::map(\app\models\NhomSo::find()->all(),'id','ten'),
                        'value'=>function($data){
                            $nhomSo=\app\models\NhomSo::find()->where(['id'=>$data->nhom_so_id])->one();
                            return $nhomSo->ten;
                        }
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} ',
                        'buttons'=>[
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/xem-so','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>'Xem chi tiết']);
                            },
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/sua-so','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>'Sửa thông tin']);
                            },
                            // // 'delete'=>function($url,$data){
                            //     $url=\yii\helpers\Url::to(['/danh-muc-chung/xoa-chuc-vu','id'=>$data->id]);
                            //     return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                            //         'title'=>'Xóa thông tin',
                            //         'data'=>['method'=>'post','confirm' => 'Bạn có muốn xóa bản ghi này hay không?']
                            //     ]);
                            // },
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-so'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
