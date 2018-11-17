<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xa_phuong".
 *
 * @property int $id
 * @property string $ma
 * @property string $ten
 * @property int $quan_huyen_id
 */
class XaPhuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xa_phuong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma','ten'],'required'],
            [['quan_huyen_id','tinh_thanh_id'], 'integer'],
            [['ma'], 'string', 'max' => 50],
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
            'ma' => 'Mã',
            'ten' => 'Tên phường xã',
            'quan_huyen_id' => 'Thuộc Quận huyện',
            'tinh_thanh_id'=>'Thuộc Tỉnh thành',
        ];
    }
}
