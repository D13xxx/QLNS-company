<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loai_hinh_nghi_phep".
 *
 * @property int $id
 * @property string $ten
 * @property int $trang_thai
 */
class LoaiHinhNghiPhep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loai_hinh_nghi_phep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trang_thai'], 'integer'],
            [['ten'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên',
            'trang_thai' => 'Trạng thái',
        ];
    }
}
