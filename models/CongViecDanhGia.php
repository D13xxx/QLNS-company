<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cong_viec_danh_gia".
 *
 * @property int $id
 * @property string $noi_dung
 * @property int $cong_viec_tien_do_id
 * @property string $ngay_lap
 * @property int $nguoi_lap
 */
class CongViecDanhGia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_viec_danh_gia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noi_dung'], 'string'],
            [['cong_viec_tien_do_id', 'nguoi_lap'], 'integer'],
            [['ngay_lap'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'noi_dung' => 'Nội dung',
            'cong_viec_tien_do_id' => 'Công việc chi tiêt',
            'ngay_lap' => 'Ngày lập',
            'nguoi_lap' => 'Người lập',
        ];
    }
}
