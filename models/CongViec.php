<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cong_viec".
 *
 * @property int $id
 * @property string $ten
 * @property string $noi_dung
 * @property int $nguoi_lap
 * @property string $ngay_lap
 * @property string $ngay_bat_dau
 * @property string $ngay_ket_thuc
 * @property int $nguoi_thuc_hien
 * @property int $trang_thai
 */
class CongViec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const CV_MOI=0;
    const CV_GIAOVIEC=1;
    const CV_DANGTIENHANH=2;
    const CV_HOANTHANH=3;
    const CV_DAHOANTHANH=4;
    const CV_COPHANHOI=5;

    const MD_KhongUuTien=0;
    const MD_BinhThuong=1;
    const MD_UuTien=2;
    const MD_Gap=3;

    public static function tableName()
    {
        return 'cong_viec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten','yeu_cau_cong_viec'],'required'],
            [['noi_dung'], 'string'],
            [['nguoi_lap', 'nguoi_thuc_hien', 'trang_thai'], 'integer'],
            [['ngay_lap', 'ngay_bat_dau', 'ngay_ket_thuc','ngay_hoan_thanh','ngay_xac_minh_hoan_thanh'], 'safe'],
            [['ten'], 'string', 'max' => 400],
            [['yeu_cau_cong_viec'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên công việc',
            'noi_dung' => 'Nội dung',
            'nguoi_lap' => 'Người lập',
            'ngay_lap' => 'Ngày lập',
            'ngay_bat_dau' => 'Ngày bắt đầu',
            'ngay_ket_thuc' => 'Ngày kết thúc',
            'nguoi_thuc_hien' => 'Người thực hiện',
            'trang_thai' => 'Trạng thái',
            'ngay_hoan_thanh'=>'Ngày hoàn thành',
            'ngay_xac_minh_hoan_thanh'=>'Ngày xác minh hoàn thành',
            'yeu_cau_cong_viec'=>'Mức độ ưu tiên',
        ];
    }
}
