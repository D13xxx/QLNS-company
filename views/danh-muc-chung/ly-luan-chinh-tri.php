<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\LyLuanChinhTriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lý luận chính trị';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ly-luan-chinh-tri-index">

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
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/xem-ly-luan-chinh-tri','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>'Xem chi tiết']);
                            },
                            'update'=>function($url,$data){
                                $url=\yii\helpers\Url::to(['/danh-muc-chung/sua-ly-luan-chinh-tri','id'=>$data->id]);
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>'Sửa thông tin']);
                            },
                           
                        ]
                    ],
                ],
            ]); ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['/danh-muc-chung/them-ly-luan-chinh-tri'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
