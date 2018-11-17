<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\MoiQuanHeGiaDinhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mối quan hệ gia đình';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moi-quan-he-gia-dinh-index">

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

                    'ten',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} ',
                        'buttons'=>[
                            'view'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/xem-quan-he-gia-dinh','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>'Xem chi tiết']);
                            },
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/sua-quan-he-gia-dinh','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>'Sửa thông tin']);
                            },
                           
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-quan-he-gia-dinh'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
