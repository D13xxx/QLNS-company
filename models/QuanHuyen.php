<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quan_huyen".
 *
 * @property int $id
 * @property string $ma
 * @property string $ten
 * @property int $tinh_thanh_id
 */
class QuanHuyen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quan_huyen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma','ten'],'required'],
            [['tinh_thanh_id'], 'integer'],
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
            'ma' => 'Mã Quận huyện',
            'ten' => 'Tên Quận huyện',
            'tinh_thanh_id' => 'Thuộc tỉnh thành',
        ];
    }
}
