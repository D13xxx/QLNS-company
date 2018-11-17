<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "luan_chuyen".
 *
 * @property int $id
 * @property int $nhan_su_id
 * @property int $phong_ban_cu
 * @property int $phong_ban_moi
 * @property string $ngay_dieu_chinh
 * @property string $ngay_ap_dung
 * @property string $so_quyet_dinh
 */
class LuanChuyen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'luan_chuyen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nhan_su_id', 'phong_ban_cu', 'phong_ban_moi'], 'integer'],
            [['ngay_dieu_chinh', 'ngay_ap_dung'], 'safe'],
            [['so_quyet_dinh'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nhan_su_id' => 'Nhan Su ID',
            'phong_ban_cu' => 'Phòng ban cũ',
            'phong_ban_moi' => 'Phòng ban mới',
            'ngay_dieu_chinh' => 'Ngày điều chỉnh',
            'ngay_ap_dung' => 'Ngày thực hiện',
            'so_quyet_dinh' => 'Số quyết định',
        ];
    }
}
