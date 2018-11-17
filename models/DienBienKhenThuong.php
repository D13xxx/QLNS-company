<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dien_bien_khen_thuong".
 *
 * @property int $id
 * @property string $ngay_thang
 * @property string $so_quyet_dinh
 * @property string $noi_dung
 * @property string $hinh_thuc
 * @property string $cap_khen_thuong
 * @property int $nhan_su_id
 */
class DienBienKhenThuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dien_bien_khen_thuong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ngay_thang'], 'safe'],
            [['noi_dung'], 'string'],
            [['nhan_su_id'], 'integer'],
            [['so_quyet_dinh', 'cap_khen_thuong'], 'string', 'max' => 256],
            [['hinh_thuc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngay_thang' => 'Ngày khen thưởng',
            'so_quyet_dinh' => 'Số quyết định',
            'noi_dung' => 'Nội dung',
            'hinh_thuc' => 'Hình thức',
            'cap_khen_thuong' => 'Cấp khen thưởng',
            'nhan_su_id' => 'Nhan Su ID',
        ];
    }
}
