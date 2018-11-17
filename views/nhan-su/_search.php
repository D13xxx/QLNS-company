<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NhanSuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-su-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ho_ten') ?>

    <?= $form->field($model, 'ten_khac') ?>

    <?= $form->field($model, 'ngay_sinh') ?>

    <?= $form->field($model, 'gioi_tinh') ?>

    <?php // echo $form->field($model, 'que_quan_tinh_id') ?>

    <?php // echo $form->field($model, 'que_quan_huyen_id') ?>

    <?php // echo $form->field($model, 'que_quan_xa_id') ?>

    <?php // echo $form->field($model, 'que_quan') ?>

    <?php // echo $form->field($model, 'dan_toc_id') ?>

    <?php // echo $form->field($model, 'ton_giao_id') ?>

    <?php // echo $form->field($model, 'ho_khau_thuong_tru') ?>

    <?php // echo $form->field($model, 'noi_o_hien_nay') ?>

    <?php // echo $form->field($model, 'nghe_nghiep_khi_tuyen') ?>

    <?php // echo $form->field($model, 'ngay_tuyen_dung') ?>

    <?php // echo $form->field($model, 'co_quan_tuyen_dung') ?>

    <?php // echo $form->field($model, 'chuc_vu_id') ?>

    <?php // echo $form->field($model, 'chuc_danh_id') ?>

    <?php // echo $form->field($model, 'phong_ban_id') ?>

    <?php // echo $form->field($model, 'cong_viec_chinh') ?>

    <?php // echo $form->field($model, 'ngach_cong_chuc_id') ?>

    <?php // echo $form->field($model, 'ma_ngach') ?>

    <?php // echo $form->field($model, 'bac_luong') ?>

    <?php // echo $form->field($model, 'he_so') ?>

    <?php // echo $form->field($model, 'ngay_huong') ?>

    <?php // echo $form->field($model, 'phu_cap_chuc_vu') ?>

    <?php // echo $form->field($model, 'phu_cap_khac') ?>

    <?php // echo $form->field($model, 'trinh_do_pho_thong') ?>

    <?php // echo $form->field($model, 'trinh_do_chuyen_mon_id') ?>

    <?php // echo $form->field($model, 'chuyen_nghanh') ?>

    <?php // echo $form->field($model, 'ly_luan_chinh_tri_id') ?>

    <?php // echo $form->field($model, 'quan_ly_nha_nuoc_id') ?>

    <?php // echo $form->field($model, 'ngoai_ngu') ?>

    <?php // echo $form->field($model, 'tin_hoc') ?>

    <?php // echo $form->field($model, 'ngay_vao_dang') ?>

    <?php // echo $form->field($model, 'ngay_chinh_thuc') ?>

    <?php // echo $form->field($model, 'ngay_tham_gia_to_chuc_chinh_tri_xa_hoi') ?>

    <?php // echo $form->field($model, 'viec_lam_to_chuc_chinh_tri_xa_hoi') ?>

    <?php // echo $form->field($model, 'ngay_nhap_ngu') ?>

    <?php // echo $form->field($model, 'ngay_xuat_ngu') ?>

    <?php // echo $form->field($model, 'quan_ham') ?>

    <?php // echo $form->field($model, 'danh_hieu_phong_tang') ?>

    <?php // echo $form->field($model, 'so_truong_cong_tac') ?>

    <?php // echo $form->field($model, 'khen_thuong') ?>

    <?php // echo $form->field($model, 'nam_khen_thuong') ?>

    <?php // echo $form->field($model, 'ky_luat') ?>

    <?php // echo $form->field($model, 'nam_ky_luat') ?>

    <?php // echo $form->field($model, 'tinh_trang_suc_khoe') ?>

    <?php // echo $form->field($model, 'chieu_cao') ?>

    <?php // echo $form->field($model, 'can_nang') ?>

    <?php // echo $form->field($model, 'nhom_mau') ?>

    <?php // echo $form->field($model, 'hang_thuong_binh') ?>

    <?php // echo $form->field($model, 'con_gia_dinh_chinh_sach_id') ?>

    <?php // echo $form->field($model, 'so_chung_minh_nhan_dan') ?>

    <?php // echo $form->field($model, 'ngay_cap') ?>

    <?php // echo $form->field($model, 'so_so_bhxh') ?>

    <?php // echo $form->field($model, 'anh_nhan_vien') ?>

    <?php // echo $form->field($model, 'khai_ro_bi_bat_bi_tu') ?>

    <?php // echo $form->field($model, 'tham_gia_to_chuc_nuoc_ngoai') ?>

    <?php // echo $form->field($model, 'than_nhan_o_nuoc_ngoai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
