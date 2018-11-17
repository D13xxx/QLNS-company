<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "nhan_su".
 */
class NhanSu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nhan_su';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ho_ten','ngay_sinh','gioi_tinh','ngay_tuyen_dung','chuc_vu_id','phong_ban_id','so_chung_minh_nhan_dan','ngay_cap'],'required'],
            [['ngay_sinh', 'ngay_tuyen_dung', 'ngay_huong', 'ngay_vao_dang', 'ngay_chinh_thuc','ngay_cap'], 'safe'],
            [['nghi_viec','gioi_tinh', 'que_quan_tinh_id','que_quan_huyen_id', 'que_quan_xa_id', 'dan_toc_id', 'ton_giao_id', 'chuc_vu_id', 'phong_ban_id', 'bac_luong', 'trinh_do_chuyen_mon_id',], 'integer'],
            [['he_so', 'phu_cap_chuc_vu', 'phu_cap_khac'], 'number'],
            [['anh_nhan_vien', ], 'string'],
            [['ho_ten', 'ten_khac', 'chuyen_nghanh', 'ngoai_ngu', 'tin_hoc'], 'string', 'max' => 256],
            [['que_quan', 'cong_viec_chinh'], 'string', 'max' => 300],
            [['ho_khau_thuong_tru', 'noi_o_hien_nay','nghe_nghiep_khi_tuyen', 'co_quan_tuyen_dung', 'so_truong_cong_tac'], 'string', 'max' => 500],
            [['trinh_do_pho_thong'], 'string', 'max' => 10],
            [[ 'so_chung_minh_nhan_dan', 'so_so_bhxh'], 'string', 'max' => 50],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ho_ten' => 'Họ tên',
            'ten_khac' => 'Tên khác',
            'ngay_sinh' => 'Ngày sinh',
            'gioi_tinh' => 'Giới tính',
            'que_quan_tinh_id' => 'Tỉnh thành',
            'que_quan_huyen_id' => 'Quận huyện',
            'que_quan_xa_id' => 'Xã phường',
            'que_quan' => 'Quê quán',
            'dan_toc_id' => 'Dân tộc',
            'ton_giao_id' => 'Tôn giáo',
            'ho_khau_thuong_tru' => 'Hộ khẩu thường trú',
            'noi_o_hien_nay' => 'Chỗ ở hiện nay',
            'nghe_nghiep_khi_tuyen' => 'Nghề nghiệp khi tuyển',
            'ngay_tuyen_dung' => 'Ngày tuyển dụng',
            'co_quan_tuyen_dung' => 'Cơ quan tuyển dụng',
            'chuc_vu_id' => 'Chức vụ hiện tại',
            'phong_ban_id' => 'Phòng ban',
            'cong_viec_chinh' => 'Công việc chính',
            'ngach_cong_chuc' => 'Ngạch công chức',
            'bac_luong' => 'Bậc lương',
            'he_so' => 'Hệ số',
            'ngay_huong' => 'Ngày hưởng',
            'phu_cap_chuc_vu' => 'Phụ cấp chức vụ',
            'phu_cap_khac' => 'Phụ cấp khác',
            'trinh_do_pho_thong' => 'Trình độ phổ thông',
            'trinh_do_chuyen_mon_id' => 'Trình độ chuyên môn',
            'chuyen_nghanh' => 'Chuyên nghành',
            'ngoai_ngu' => 'Ngoại ngữ',
            'tin_hoc' => 'Tin học',
            'so_chung_minh_nhan_dan' => 'Số chứng minh thư nhân dân',
            'ngay_cap' => 'Ngày cấp',
            'so_so_bhxh' => 'Số sổ BHXH',
            'anh_nhan_vien' => 'Ảnh nhân viên',
            'nghi_viec'=>'Nghỉ việc',
        ];
    }
    // public function  rules(){
    //     return [
    //      [['inputfield_date'], 'required'],
    //      [['inputfield_date'], 'safe'],
    //      ['inputfield_date', 'date', 'format' => 'yyyy-M-d H:m:s'],
    //    ];
    // }
}
