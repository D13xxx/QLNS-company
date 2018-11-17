<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NhanSuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách CBCNV';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-su-index">

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
                'summary'=>'',
                'columns' => [
                    //['class' => 'kartik\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'width' => '50px',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_EXPANDED;
                        },
                        'detail' => function ($model, $key, $index, $column) {
                            return Yii::$app->controller->renderPartial('_mien_nhiem', ['phong_ban_id' => $model->id]);
                            //return Yii::$app->runAction('/ho-so/danh-sach-ho-so',['id'=>$model->id]);
                        },
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'expandOneOnly' => true,
                    ],
                    [
                        'attribute'=>'ten_day_du',
                        'label'=>'Tên phòng ban',
                        'contentOptions'=>[
                            'style'=>'font-size: 15px; font-weight: bold'
                        ]
                    ],

                ]
            ])?>

        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
<div class="clearfix"></div>