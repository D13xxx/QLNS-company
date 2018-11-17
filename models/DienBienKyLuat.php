<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dien_bien_ky_luat".
 *
 * @property int $id
 * @property string $ngay_thang
 * @property string $so_quyet_dinh
 * @property string $noi_dung
 * @property string $hinh_thuc
 * @property string $cap_quyet_dinh
 * @property int $nhan_su_id
 */
class DienBienKyLuat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dien_bien_ky_luat';
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
            [['so_quyet_dinh', 'cap_quyet_dinh'], 'string', 'max' => 256],
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
            'ngay_thang' => 'Ngày kỷ luật',
            'so_quyet_dinh' => 'Số quyết định',
            'noi_dung' => 'Nội dung',
            'hinh_thuc' => 'Hình thức',
            'cap_quyet_dinh' => 'Cấp quyết định',
            'nhan_su_id' => 'Nhan Su ID',
        ];
    }
}
