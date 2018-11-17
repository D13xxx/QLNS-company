<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Thông tin tài khoản'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
<div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Thông tin chi tiết tài khoản
            </h4>
        </div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',
                    [
                        'attribute'=>'status',
                        'value'=>function($data){
                            if ($data->status==10){
                                return 'Hoạt động';
                            }else{
                                return'Không hoạt động';
                            }

                        }
                    ],
                    'fullname',
//                    [
//                        'attribute'=>'phong_ban_id',
//                        'value'=>function($data)
//                        {
//                            $nhomPB=\app\models\PhongBan::find()->where(['id'=>$data->phong_ban_id])->one();
//                            return $nhomPB->ten_day_du;
//                        }
//                    ],
                    [
                        'attribute'=>'is_admin',
                        'value'=>function($data){
                            if ($data->is_admin==1){
                                return 'Người quản trị';
                            }else{
                                return'Người dùng';
                            }

                        }
                    ],
                ],
            ]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a('<span class="fa fa-edit"></span> Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['site/index'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
</div>
