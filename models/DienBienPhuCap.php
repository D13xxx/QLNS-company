<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dien_bien_phu_cap".
 *
 * @property int $id
 * @property string $ten
 * @property string $muc_huong
 * @property string $tu_ngay
 * @property string $den_ngay
 * @property string $so_quyet_dinh
 * @property int $nhan_su_id
 */
class DienBienPhuCap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dien_bien_phu_cap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['nhan_su_id'], 'integer'],
            [['ten', 'so_quyet_dinh'], 'string', 'max' => 256],
            [['muc_huong'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên phụ cấp',
            'muc_huong' => 'Mức hưởng',
            'tu_ngay' => 'Ngày bắt đầu',
            'den_ngay' => 'Ngày kết thúc',
            'so_quyet_dinh' => 'Số quyết định',
            'nhan_su_id' => 'Nhan Su ID',
        ];
    }
}
