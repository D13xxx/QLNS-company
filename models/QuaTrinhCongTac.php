<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qua_trinh_cong_tac".
 *
 * @property int $id
 * @property int $nhan_su_id
 * @property string $tu_ngay
 * @property string $den_ngay
 * @property string $qua_trinh_cong_tac
 * @property string $bien_che
 * @property int $chu_vu_id
 * @property string $chuc_danh
 */
class QuaTrinhCongTac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qua_trinh_cong_tac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nhan_su_id', 'chu_vu_id'], 'integer'],
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['qua_trinh_cong_tac'], 'string'],
            [['bien_che', 'chuc_danh'], 'string', 'max' => 256],
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
            'tu_ngay' => 'Từ ngày',
            'den_ngay' => 'Đến ngày',
            'qua_trinh_cong_tac' => 'Đơn vị công tác',
            'bien_che' => 'Biên chế',
            'chu_vu_id' => 'Chức vụ',
            'chuc_danh' => 'Chức danh',
        ];
    }
}
