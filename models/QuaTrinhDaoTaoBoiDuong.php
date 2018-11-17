<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qua_trinh_dao_tao_boi_duong".
 *
 * @property int $id
 * @property string $ten_truong
 * @property string $chuyen_nganh
 * @property string $tu_ngay
 * @property string $den_ngay
 * @property string $hinh_thuc_dao_tao
 * @property string $van_bang
 * @property int $nhan_su_id
 */
class QuaTrinhDaoTaoBoiDuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qua_trinh_dao_tao_boi_duong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['nhan_su_id','trinh_do_id'], 'integer'],
            [['ten_truong', 'chuyen_nganh', 'hinh_thuc_dao_tao', 'van_bang'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_truong' => 'Tên cơ sở đào tạo',
            'chuyen_nganh' => 'Chuyên ngành',
            'tu_ngay' => 'Bắt đầu',
            'den_ngay' => 'Kết thúc',
            'hinh_thuc_dao_tao' => 'Hình thức',
            'van_bang' => 'Văn bằng',
            'nhan_su_id' => 'Nhân viên',
            'trinh_do_id'=>'Trình độ',
        ];
    }
}
