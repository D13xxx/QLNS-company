<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ke_hoach".
 *
 * @property int $id
 * @property string $so_hieu
 * @property string $noi_dung
 * @property int $nguoi_tao
 * @property string $ngay_tao
 * @property int $chuc_vu_id
 * @property int $nguoi_ky
 * @property int $loai_hinh
 * @property int $trang_thai
 */
class KeHoach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const KH_MOI=1;
    const KH_CHOPHEDUYET=2;
    const KH_DADUYET=3;
    const KH_TRALAI=4;
    public static function tableName()
    {
        return 'ke_hoach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_hieu', 'noi_dung', 'nguoi_tao', 'ngay_tao', 'loai_hinh', 'trang_thai'], 'required'],
            [['noi_dung'], 'string'],
            [['nguoi_tao', 'chuc_vu_id', 'nguoi_ky', 'loai_hinh', 'trang_thai'], 'integer'],
            [['ngay_tao'], 'safe'],
            [['so_hieu'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_hieu' => 'Số hiệu',
            'noi_dung' => 'Nội dung',
            'nguoi_tao' => 'Người tạo',
            'ngay_tao' => 'Ngày tạo',
            'chuc_vu_id' => 'Chức vụ',
            'nguoi_ky' => 'Người ký',
            'loai_hinh' => 'Loại hình',
            'trang_thai' => 'Trạng thái',
        ];
    }
}
