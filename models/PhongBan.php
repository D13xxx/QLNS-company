<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phong_ban".
 *
 * @property int $id
 * @property string $ten_viet_tat
 * @property string $ten_day_du
 */
class PhongBan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phong_ban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_viet_tat'], 'string', 'max' => 50],
            [['ten_day_du'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_viet_tat' => 'Tên viết tắt',
            'ten_day_du' => 'Tên đầy đủ',
        ];
    }
}
