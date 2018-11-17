<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qua_trinh_nghi_phep".
 *
 * @property int $id
 * @property int $nhan_su_id
 * @property int $loai_hinh_nghi_phep_id
 * @property string $tu_ngay
 * @property string $den_ngay
 * @property string $ly_do
 */
class QuaTrinhNghiPhep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qua_trinh_nghi_phep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nhan_su_id', 'loai_hinh_nghi_phep_id'], 'integer'],
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['ly_do'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nhan_su_id' => 'Nhan Su ID',
            'loai_hinh_nghi_phep_id' => 'Loại hình nghỉ phép',
            'tu_ngay' => 'Từ ngày',
            'den_ngay' => 'Đến ngày',
            'ly_do' => 'Lý do',
        ];
    }
}
