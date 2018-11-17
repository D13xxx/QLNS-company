<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dien_bien_luong".
 *
 * @property int $id
 * @property string $ngay_thang
 * @property string $ma_ngach
 * @property double $he_so_luong
 * @property int $nhan_su_id
 * @property string $ngach_cong_chu
 * @property string $bac_luong
 * @property string $muc_huong
 * @property string $loai_nang_luong
 * @property string $so_quyet_dinh
 */
class DienBienLuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dien_bien_luong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ngay_thang'], 'safe'],
            [['he_so_luong'], 'number'],
            [['nhan_su_id'], 'integer'],
            [['ma_ngach'], 'string', 'max' => 10],
            [['ngach_cong_chu'], 'string', 'max' => 50],
            [['bac_luong'], 'string', 'max' => 15],
            [['muc_huong'], 'string', 'max' => 4],
            [['loai_nang_luong', 'so_quyet_dinh'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngay_thang' => 'Ngày xếp lương',
            'ma_ngach' => 'Mã nghạch',
            'he_so_luong' => 'Hệ số',
            'nhan_su_id' => 'Nhan Su ID',
            'ngach_cong_chu' => 'Ngạch công chức',
            'bac_luong' => 'Bậc lương',
            'muc_huong' => 'Mức hưởng',
            'loai_nang_luong' => 'Loại nâng',
            'so_quyet_dinh' => 'Số quyết định',
        ];
    }
}
