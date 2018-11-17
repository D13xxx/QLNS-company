<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trinh_do_chuyen_mon".
 *
 * @property int $id
 * @property string $ten
 */
class TrinhDoChuyenMon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trinh_do_chuyen_mon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['ten','required'],
            [['ten'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Trình độ chuyên môn',
        ];
    }
}
