<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cong_viec_tien_do".
 *
 * @property int $id
 * @property string $noi_dung
 * @property int $nguoi_lap
 * @property string $ngay_lap
 * @property int $tien_do
 * @property string $tep_dinh_kem
 * @property int $cong_viec_id
 */
class CongViecTienDo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_viec_tien_do';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noi_dung'], 'string'],
            [['nguoi_lap', 'tien_do', 'cong_viec_id'], 'integer'],
            [['ngay_lap'], 'safe'],
            [['tep_dinh_kem'], 'string', 'max' => 256],
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
            'nguoi_lap' => 'Người lập',
            'ngay_lap' => 'Ngày lập',
            'tien_do' => 'Tiến độ',
            'tep_dinh_kem' => 'Tệp đính kèm',
            'cong_viec_id' => 'Thuộc công việc',
        ];
    }


}
