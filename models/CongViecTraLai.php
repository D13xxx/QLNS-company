<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cong_viec_tra_lai".
 *
 * @property int $id
 * @property int $cong_viec_id
 * @property string $ly_do_tra_lai
 * @property string $ngay_lap
 * @property int $nguoi_lap
 */
class CongViecTraLai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_viec_tra_lai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cong_viec_id', 'nguoi_lap'], 'integer'],
            [['ly_do_tra_lai'], 'string'],
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
            'cong_viec_id' => 'Công việc',
            'ly_do_tra_lai' => 'Lý do',
            'ngay_lap' => 'Ngày lập',
            'nguoi_lap' => 'Người lập',
        ];
    }
}
