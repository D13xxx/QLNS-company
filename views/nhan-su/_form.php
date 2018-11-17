<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\admin\models\AuthItem;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\NhanSu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-su-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'],
        'fieldConfig'=>[
            'template' => "{label}\n<div class=\"col-sm-12\">{input}</div><div class=\"col-sm-0\"></div>\n<div class=\"col-sm-8\">{error}</div>",
//             'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="panel-body">
            <?php
            if($model->isNewRecord){ ?>
                <div class="row">
                    <table>
                        <tr>
                            <td colspan="3">
                                <?= $form->field($model, 'anh_nhan_vien')->widget(\kartik\file\FileInput::className(),[
                                    'options'=>['accept'=>['*']],
                                    'pluginOptions'=>[
                                        'allowedFileExtensions'=>['jpg','jpeg','bmp','png','gif'],
                                        'showUpload'=>false,
                                    ]
                                ])->label(false) ?>
                            </td>
                            <td colspan="9">
                                <table style="width:100%;overflow-x:auto" class="table1">
                                    <tr>
                                        <td colspan="1">1) Họ và tên(*)</td>
                                        <td colspan="5">
                                            <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">2) Họ và tên khác()</td>
                                        <td colspan="5">
                                            <?= $form->field($model, 'ten_khac')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3) Ngày sinh(*)</td>
                                        <td>
                                            <?= $form->field($model, 'ngay_sinh')->widget(\yii\jui\DatePicker::className(),[
                                                'options'=>['class'=>'form-control'],
                                                'dateFormat'=>'dd/MM/yyyy'
                                            ])->label(false)?>


                                        </td>
                                        <td>4) Giới tính()</td>
                                        <td>
                                            <?= $form->field($model, 'gioi_tinh')->dropDownList(['1'=>'Nam','0'=>'Nữ'],["class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">5)Tỉnh thành(*)</td>
                                        <td colspan="1"><?php
                                            $tinhThanh=\app\models\TinhThanh::find()->all();
                                            $listTinhThanh=\yii\helpers\ArrayHelper::map($tinhThanh,'id','ten')
                                            ?>
                                            <?= $form->field($model,'que_quan_tinh_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listTinhThanh,
                                                'options'=>[
                                                    'prompt'=>'Lựa chọn tỉnh thành .....',
                                                    'onchange'=>'
                                                        $.get( "'.\yii\helpers\Url::toRoute('/danh-muc-chung/danh-sach-quan-huyen').'", { id: $(this).val() } )
                                                            .done(function( data ) {
                                                                $( "#'.Html::getInputId($model, 'que_quan_huyen_id').'" ).html( data );
                                                            }
                                                        );
                                                    '
                                                ],
                                                'pluginOptions'=>['allowClear'=>true]
                                            ])->label(false)?></td>
                                        <td colspan="1">Quận huyện(*)</td>
                                        <td colspan="1">
                                            <?php
                                            $quanHuyen=\app\models\QuanHuyen::find()->all();
                                            $listQuanHuyen=\yii\helpers\ArrayHelper::map($quanHuyen,'id','ten');
                                            ?>
                                            <?= $form->field($model, 'que_quan_huyen_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listQuanHuyen,
                                                'options'=>[
                                                    'prompt'=>'Lựa chọn Quận huyện .....',
                                                    'onchange'=>'
                                        $.get( "'.\yii\helpers\Url::toRoute('/danh-muc-chung/danh-sach-xa-phuong').'", { id: $(this).val() } )
                                            .done(function( data ) {
                                                $( "#'.Html::getInputId($model, 'que_quan_xa_id').'" ).html( data );
                                            }
                                        );
                                    '
                                                ],
                                                'pluginOptions'=>['allowClear'=>true]
                                            ])->label(false) ?>
                                        </td>
                                        <td colspan="1">Xã phường(*)</td>
                                        <td colspan="1">
                                            <?php
                                            $phuongXa=\app\models\XaPhuong::find()->all();
                                            $listXaPhuong=\yii\helpers\ArrayHelper::map($phuongXa,'id','ten');
                                            ?>
                                            <?= $form->field($model, 'que_quan_xa_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listXaPhuong,
                                                'options'=>['prompt'=>'Chọn phường xã ....'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Quê Quán</td>
                                        <td colspan="5"><?= $form->field($model, 'que_quan')->textInput(['maxlength' => true,'readOnly'=>true,"class"=>'control-label'])->label( false)?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">6)Dân tộc(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $danToc=\app\models\DanToc::find()->all();
                                            $listDanToc=\yii\helpers\ArrayHelper::map($danToc,'id','ten');
                                            ?>

                                            <?= $form->field($model, 'dan_toc_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listDanToc,
                                                'options'=>['prompt'=>'Thuộc dân tộc ......'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false)?>
                                        </td>
                                        <td colspan="1">7)Tôn giáo(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $tonGiao=\app\models\TonGiao::find()->all();
                                            $listTonGiao=\yii\helpers\ArrayHelper::map($tonGiao,'id','ten');
                                            ?>

                                            <?= $form->field($model, 'ton_giao_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listTonGiao,
                                                'options'=>['prompt'=>'Tôn giáo .....'],
                                                'pluginOptions'=>['allowClear'=>true,"class"=>'controller-lable'],
                                            ])->label(false) ?>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12">
                                <table style="width:99%;margin-left: 1%;overflow-x:auto" class="table2">
                                    <tbody>
                                    <tr>
                                        <td colspan="1">8) Hộ khẩu thường trú ()</td>
                                        <td colspan="4">
                                            <?= $form->field($model, 'ho_khau_thuong_tru')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="3">(Số nhà, đường phố, thôn, xóm, huyện, tỉnh)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">9) Chỗ ở hiện nay</td>
                                        <td colspan="4">
                                            <?= $form->field($model, 'noi_o_hien_nay')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="3">(Số nhà, đường phố, thôn, xóm, huyện, tỉnh)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">10) Nghề nghiệp khi tuyển </td>
                                        <td colspan="7">
                                            <?= $form->field($model, 'nghe_nghiep_khi_tuyen')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">11) Ngày tuyển dụng </td>
                                        <td colspan="3">
                                            <?= $form->field($model, 'ngay_tuyen_dung')->widget(\yii\jui\DatePicker::className(),[
                                                'options'=>['class'=>'form-control'],
                                                'dateFormat'=>'dd/MM/yyyy'
                                            ])->label(false)?>

                                        </td>
                                        <td colspan="1">12) Cơ quan tuyển dụng </td>
                                        <td colspan="3">
                                            <?= $form->field($model, 'co_quan_tuyen_dung')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">12.1) Phòng ban(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $phongBan=\app\models\PhongBan::find()->all();
                                            $listPhongBan= \yii\helpers\ArrayHelper::map($phongBan,'id','ten_day_du');
                                            ?>
                                            <?= $form->field($model, 'phong_ban_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listPhongBan,
                                                'options'=>['prompt'=>'Phòng ban .....'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false) ?>
                                        </td>
                                        <td colspan="1">12.2) Chức vụ hiện tại(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $chucVu=\app\models\ChucVu::find()->all();
                                            $listChucVu= \yii\helpers\ArrayHelper::map($chucVu,'id','ten_day_du');
                                            ?>
                                            <?= $form->field($model, 'chuc_vu_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listChucVu,
                                                'options'=>['prompt'=>'Chức vụ .....'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false) ?>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="1">13.1) Bậc lương</td>
                                        <td colspan="1"><?= $form->field($model, 'bac_luong')->textInput(["class"=>'control-label'])->label(false) ?></td>
                                        <td colspan="1">13.2) Hệ số</td>
                                        <td colspan="1"><?= $form->field($model, 'he_so')->textInput(["class"=>'control-label'])->label(false) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                            14) Ngày hưởng
                                        </td>
                                        <td colspan="1">
                                            <?= $form->field($model, 'ngay_huong')->widget(\yii\jui\DatePicker::className(),[
                                                'options'=>['class'=>'form-control'],
                                                'dateFormat'=>'dd/MM/yyyy'
                                            ])->label(false)?>
                                        </td>
                                        <td colspan="1">14.1) Phụ cấp chức vụ</td>
                                        <td colspan="2">
                                            <?= $form->field($model, 'phu_cap_chuc_vu')->textInput(["class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="1">14.2) Phụ cấp khác</td>
                                        <td colspan="2"><?= $form->field($model, 'phu_cap_khac')->textInput(["class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">15.1) Trình độ tốt nghiệp THPT</td>
                                        <td colspan="4"><?= $form->field($model, 'trinh_do_pho_thong')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="2">Đã tốt nghiệp lớp mấy, thuộc hệ nào</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">15.2) Trình độ chuyên môn cao nhất</td>
                                        <td colspan="1">
                                            <?php
                                            $trinhDoChuyenMon=\app\models\TrinhDoChuyenMon::find()->all();
                                            $listTDCM= \yii\helpers\ArrayHelper::map($trinhDoChuyenMon,'id','ten');
                                            ?>
                                            <?= $form->field($model, 'trinh_do_chuyen_mon_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listTDCM,
                                                'options'=>['prompt'=>'Trình độ chuyên môn ....'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false) ?>
                                        </td>
                                        <td colspan="1">15.3) Chuyên ngành</td>
                                        <td colspan="5"><?= $form->field($model, 'chuyen_nghanh')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="1">15.4)Trình độ ngoại ngữ</td>
                                        <td colspan="3"><?= $form->field($model, 'ngoai_ngu')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="1">15.5)Trình độ tin học</td>
                                        <td colspan="3"><?= $form->field($model, 'tin_hoc')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td colspan="1">16.1) Số CMT nhân dân(*)</td>
                                        <td colspan="3"><?= $form->field($model, 'so_chung_minh_nhan_dan')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                        <td colspan="1">16.2) Ngày cấp(*)</td>
                                        <td colspan="3">
                                            <?= $form->field($model, 'ngay_cap')->widget(\yii\jui\DatePicker::className(),[
                                                'options'=>['class'=>'form-control'],
                                                'dateFormat'=>'dd/MM/yyyy'
                                            ])->label(false)?>
                                    </tr>
                                    <tr>
                                        <td colspan="1">17) Số bảo hiểm xã hội</td>
                                        <td colspan="7"><?= $form->field($model, 'so_so_bhxh')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>

                </div>


            <?php } else { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= Html::a('Thông tin chung',['/nhan-su/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                        <?= Html::a('Đào tạo bồi dưỡng',['/nhan-su/qua-trinh-dao-tao-boi-duong','id'=>$model->id],['class'=>'btn btn-default'])?>
                        <?= Html::a('Quá trình công tác',['/nhan-su/qua-trinh-cong-tac','id'=>$model->id],['class'=>'btn btn-default'])?>
                        <?= Html::a('Nghỉ phép',['/nhan-su/qua-trinh-nghi-phep','id'=>$model->id],['class'=>'btn btn-default'])?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <?php
                                if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                                    echo Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                                        'style'=>['width'=>'200px','height'=>'250px','margin'=>'0px auto']
                                    ]);
                                } else {
                                    echo Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                                        'style'=>['width'=>'200px','height'=>'250px','margin'=>'0px auto']
                                    ]);
                                }
                                ?>
                                <div style="width:100%">

										<?= $form->field($model, 'anh_nhan_vien')->widget(\kartik\file\FileInput::className(),[
											'options'=>['accept'=>['*']],
											'pluginOptions'=>[
												'allowedFileExtensions'=>['jpg','jpeg','bmp','png','gif'],
                                            'showUpload'=>false,
                                            'showPreview'=>false,
                                            'showCaption' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                            'browseLabel' =>  'Chọn ảnh thẻ'
                                        ],
                                    ])->label(false)?>
                                </div>

                            </div>
                            <div class="col-sm-10">
                                <table style="width:100%;overflow-x:auto" class="table1">
                                    <tr>
                                        <td colspan="1">1) Họ và tên(*)</td>
                                        <td colspan="5">
                                            <?= $form->field($model, 'ho_ten')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">2) Họ và tên khác</td>
                                        <td colspan="5">
                                            <?= $form->field($model, 'ten_khac')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3) Ngày sinh(*)</td>
                                        <td>
                                            <?= $form->field($model, 'ngay_sinh')->widget(\yii\jui\DatePicker::className(),[
                                                'options'=>['class'=>'form-control'],
                                                'dateFormat'=>'dd/MM/yyyy'
                                            ])->label(false)?>

                                        </td>
                                        <td>4) Giới tính</td>
                                        <td>
                                            <?= $form->field($model, 'gioi_tinh')->dropDownList(['1'=>'Nam','0'=>'Nữ'],["class"=>'control-label'])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">5)Tỉnh thành(*)</td>
                                        <td colspan="1"><?php
                                            $tinhThanh=\app\models\TinhThanh::find()->all();
                                            $listTinhThanh=\yii\helpers\ArrayHelper::map($tinhThanh,'id','ten')
                                            ?>
                                            <?= $form->field($model,'que_quan_tinh_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listTinhThanh,
                                                'options'=>[
                                                    'prompt'=>'Lựa chọn tỉnh thành .....',
                                                    'onchange'=>'
                                        $.get( "'.\yii\helpers\Url::toRoute('/danh-muc-chung/danh-sach-quan-huyen').'", { id: $(this).val() } )
                                            .done(function( data ) {
                                                $( "#'.Html::getInputId($model, 'que_quan_huyen_id').'" ).html( data );
                                            }
                                        );
                                    '
                                                ],
                                                'pluginOptions'=>['allowClear'=>true]
                                            ])->label(false)?></td>
                                        <td colspan="1">Quận huyện(*)</td>
                                        <td colspan="1">
                                            <?php
                                            $quanHuyen=\app\models\QuanHuyen::find()->all();
                                            $listQuanHuyen=\yii\helpers\ArrayHelper::map($quanHuyen,'id','ten');
                                            ?>
                                            <?= $form->field($model, 'que_quan_huyen_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listQuanHuyen,
                                                'options'=>[
                                                    'prompt'=>'Lựa chọn Quận huyện .....',
                                                    'onchange'=>'
                                        $.get( "'.\yii\helpers\Url::toRoute('/danh-muc-chung/danh-sach-xa-phuong').'", { id: $(this).val() } )
                                            .done(function( data ) {
                                                $( "#'.Html::getInputId($model, 'que_quan_xa_id').'" ).html( data );
                                            }
                                        );
                                    '
                                                ],
                                                'pluginOptions'=>['allowClear'=>true]
                                            ])->label(false) ?>
                                        </td>
                                        <td colspan="1">Xã phường(*)</td>
                                        <td colspan="1">
                                            <?php
                                            $phuongXa=\app\models\XaPhuong::find()->all();
                                            $listXaPhuong=\yii\helpers\ArrayHelper::map($phuongXa,'id','ten');
                                            ?>
                                            <?= $form->field($model, 'que_quan_xa_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listXaPhuong,
                                                'options'=>['prompt'=>'Chọn phường xã ....'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Quê Quán</td>
                                        <td colspan="5"><?= $form->field($model, 'que_quan')->textInput(['maxlength' => true,'readOnly'=>true,"class"=>'control-label'])->label( false)?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">6)Dân tộc(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $danToc=\app\models\DanToc::find()->all();
                                            $listDanToc=\yii\helpers\ArrayHelper::map($danToc,'id','ten');
                                            ?>

                                            <?= $form->field($model, 'dan_toc_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listDanToc,
                                                'options'=>['prompt'=>'Thuộc dân tộc ......'],
                                                'pluginOptions'=>['allowClear'=>true],
                                            ])->label(false)?>
                                        </td>
                                        <td colspan="1">7)Tôn giáo(*)</td>
                                        <td colspan="2">
                                            <?php
                                            $tonGiao=\app\models\TonGiao::find()->all();
                                            $listTonGiao=\yii\helpers\ArrayHelper::map($tonGiao,'id','ten');
                                            ?>

                                            <?= $form->field($model, 'ton_giao_id')->widget(\kartik\select2\Select2::className(),[
                                                'data'=>$listTonGiao,
                                                'options'=>['prompt'=>'Tôn giáo .....'],
                                                'pluginOptions'=>['allowClear'=>true,"class"=>'controller-lable'],
                                            ])->label(false) ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <table style="width:100%;overflow-x:auto" class="table2">
                            <tbody>
                            <tr>
                                <td colspan="12">
                                    <table style="width:99%;margin-left: 1%;overflow-x:auto" class="table2">
                                        <tbody>
                                        <tr>
                                            <td colspan="1">8) Hộ khẩu thường trú ()</td>
                                            <td colspan="4">
                                                <?= $form->field($model, 'ho_khau_thuong_tru')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="3">(Số nhà, đường phố, thôn, xóm, huyện, tỉnh)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">9) Chỗ ở hiện nay</td>
                                            <td colspan="4">
                                                <?= $form->field($model, 'noi_o_hien_nay')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="3">(Số nhà, đường phố, thôn, xóm, huyện, tỉnh)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">10) Nghề nghiệp khi tuyển </td>
                                            <td colspan="7">
                                                <?= $form->field($model, 'nghe_nghiep_khi_tuyen')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">11) Ngày tuyển dụng </td>
                                            <td colspan="3">
                                                <?= $form->field($model, 'ngay_tuyen_dung')->widget(\yii\jui\DatePicker::className(),[
                                                    'options'=>['class'=>'form-control'],
                                                    'dateFormat'=>'dd/MM/yyyy'
                                                ])->label(false)?>

                                            </td>
                                            <td colspan="1">12) Cơ quan tuyển dụng </td>
                                            <td colspan="3">
                                                <?= $form->field($model, 'co_quan_tuyen_dung')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">12.1) Phòng ban(*)</td>
                                            <td colspan="2">
                                                <?php
                                                $phongBan=\app\models\PhongBan::find()->all();
                                                $listPhongBan= \yii\helpers\ArrayHelper::map($phongBan,'id','ten_day_du');
                                                ?>
                                                <?= $form->field($model, 'phong_ban_id')->widget(\kartik\select2\Select2::className(),[
                                                    'data'=>$listPhongBan,
                                                    'options'=>['prompt'=>'Phòng ban .....'],
                                                    'pluginOptions'=>['allowClear'=>true],
                                                ])->label(false) ?>
                                            </td>
                                            <td colspan="1">12.2) Chức vụ hiện tại(*)</td>
                                            <td colspan="2">
                                                <?php
                                                $chucVu=\app\models\ChucVu::find()->all();
                                                $listChucVu= \yii\helpers\ArrayHelper::map($chucVu,'id','ten_day_du');
                                                ?>
                                                <?= $form->field($model, 'chuc_vu_id')->widget(\kartik\select2\Select2::className(),[
                                                    'data'=>$listChucVu,
                                                    'options'=>['prompt'=>'Chức vụ .....'],
                                                    'pluginOptions'=>['allowClear'=>true],
                                                ])->label(false) ?>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="1">13.1) Bậc lương</td>
                                            <td colspan="1"><?= $form->field($model, 'bac_luong')->textInput(["class"=>'control-label'])->label(false) ?></td>
                                            <td colspan="1">13.2) Hệ số</td>
                                            <td colspan="1"><?= $form->field($model, 'he_so')->textInput(["class"=>'control-label'])->label(false) ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">
                                                14) Ngày hưởng
                                            </td>
                                            <td colspan="1">
                                                <?= $form->field($model, 'ngay_huong')->widget(\yii\jui\DatePicker::className(),[
                                                    'options'=>['class'=>'form-control'],
                                                    'dateFormat'=>'dd/MM/yyyy'
                                                ])->label(false)?>
                                            </td>
                                            <td colspan="1">14.1) Phụ cấp chức vụ</td>
                                            <td colspan="2">
                                                <?= $form->field($model, 'phu_cap_chuc_vu')->textInput(["class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="1">14.2) Phụ cấp khác</td>
                                            <td colspan="2"><?= $form->field($model, 'phu_cap_khac')->textInput(["class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">15.1) Trình độ tốt nghiệp THPT</td>
                                            <td colspan="4"><?= $form->field($model, 'trinh_do_pho_thong')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="2">Đã tốt nghiệp lớp mấy, thuộc hệ nào</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">15.2) Trình độ chuyên môn cao nhất</td>
                                            <td colspan="1">
                                                <?php
                                                $trinhDoChuyenMon=\app\models\TrinhDoChuyenMon::find()->all();
                                                $listTDCM= \yii\helpers\ArrayHelper::map($trinhDoChuyenMon,'id','ten');
                                                ?>
                                                <?= $form->field($model, 'trinh_do_chuyen_mon_id')->widget(\kartik\select2\Select2::className(),[
                                                    'data'=>$listTDCM,
                                                    'options'=>['prompt'=>'Trình độ chuyên môn ....'],
                                                    'pluginOptions'=>['allowClear'=>true],
                                                ])->label(false) ?>
                                            </td>
                                            <td colspan="1">15.3) Chuyên ngành</td>
                                            <td colspan="5"><?= $form->field($model, 'chuyen_nghanh')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="1">15.4)Trình độ ngoại ngữ</td>
                                            <td colspan="3"><?= $form->field($model, 'ngoai_ngu')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="1">15.5)Trình độ tin học</td>
                                            <td colspan="3"><?= $form->field($model, 'tin_hoc')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="1">16.1) Số CMT nhân dân(*)</td>
                                            <td colspan="3"><?= $form->field($model, 'so_chung_minh_nhan_dan')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                            <td colspan="1">16.2) Ngày cấp(*)</td>
                                            <td colspan="3">
                                                <?= $form->field($model, 'ngay_cap')->widget(\yii\jui\DatePicker::className(),[
                                                    'options'=>['class'=>'form-control'],
                                                    'dateFormat'=>'dd/MM/yyyy'
                                                ])->label(false)?>
                                        </tr>
                                        <tr>
                                            <td colspan="1">17) Số bảo hiểm xã hội</td>
                                            <td colspan="7"><?= $form->field($model, 'so_so_bhxh')->textInput(['maxlength' => true,"class"=>'control-label'])->label(false) ?>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <?= Html::submitButton('<span class="fa fa-check"></span> Cập nhật thông tin', ['class' =>'btn btn-success']) ?>
                        <?= Html::a('<span class="fa fa-delete"></span> Nghỉ việc',['nghi-viec','id'=>$model->id],[
                            'class'=>'btn btn-default pull-right',
                            'data'=>['method'=>'post']
                        ])?>
                    </div>
                </div>

            <?php } ?>
        </div>
        <div class="panel-footer">
            <?php
            if($model->isNewRecord){ ?>
                <?= Html::submitButton('<span class="fa fa-check"></span> Hoàn thành', ['class' =>'btn btn-success']) ?>
            <?php } else { ?>
                <?= Html::a('<span class="fa fa-plus"></span> Thêm mới nhân sự', ['/nhan-su/create'], ['class' => 'btn btn-primary']) ?>
            <?php } ?>

            <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<div class="clearfix"></div>
<script type="text/javascript">
    // //the dropdown list id; This doesn't have to be a dropdown it can be any field type.
    // $('#fil-ineput').fileinput({
    //     resizeImage: true,
    //     maxImageWidth: 100px,
    //     maxImageHeight: auto,
    //     resizePreference: 'width'
    // });
    //
</script>