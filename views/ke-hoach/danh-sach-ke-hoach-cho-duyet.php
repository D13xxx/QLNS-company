<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KeHoachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kế hoạch - Thông báo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ke-hoach-index">
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
                [
                    'attribute'=>'so_hieu',
                    'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                ],

                [
                    'attribute'=>'ngay_tao',
                    'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                ],
                [
                    'attribute'=>'nguoi_tao',
                    'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                    'filter'=>\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(),'id','username'),
                    'value'=>function($data)
                    {
                        $nguoiTao=\app\models\User::find()->where(['id'=>$data->nguoi_tao])->one();
                        return $nguoiTao->username;
                    }
                ],
                //'chuc_vu_id',
                //'nguoi_ky',
                [
                    'attribute'=>'loai_hinh',
                    'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                    'value'=>function($data){
                        if ($data->loai_hinh==1){
                            return 'Kế hoạch';
                        }elseif($data->loai_hinh==2){
                            return 'Thông báo';
                        }
                    }
                ],
                [
                    'attribute'=>'trang_thai',
                    'contentOptions'=>['style'=>['vertical-align'=>'middle']],
                    'value'=>function($data){
                        if ($data->trang_thai==1){
                            return 'Mới';
                        }elseif($data->trang_thai==2){
                            return 'Chờ xừ lý';
                        }elseif ($data->trang_thai==3){
                            return 'Đã phê duyệt';
                        }elseif ($data->trang_thai==4){
                            return 'Không phê duyệt';
                        }
                    }
                ],
                [
                	'class' => 'yii\grid\ActionColumn',
                	'template'=>'{view} {kiem-duyet}{khong-duyet}',
                	'buttons'=>[
                		'kiem-duyet'=>function($url,$data){
                			$url=\yii\helpers\Url::to(['kiem-duyet-ke-hoach','id'=>$data->id]);
                			return Html::a('<i class="glyphicon glyphicon-saved"></i>',$url,['title'=>'Duyệt kế hoạch']);
                		},
                		'khong-duyet'=>function($url,$data){
                			$url=\yii\helpers\Url::to(['khong-kiem-duyet-ke-hoach','id'=>$data->id]);
                			return Html::a('<i class="glyphicon glyphicon-refresh"></i>',$url,['title'=>'Không duyệt']);
                		},

                	]
                ],
            ],
        ]); ?>
 	</div>
 	<div class="panel-footer">
 		<?= Html::a('<span class="fa fa-plus"></span> Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
 	</div>
 </div>


</div>
