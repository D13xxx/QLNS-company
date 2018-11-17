<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tinh_thanh".
 *
 * @property int $id
 * @property string $ma
 * @property string $ten
 */
class TinhThanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tinh_thanh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma','ten'],'required'],
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
            'ma' => 'Mã Tỉnh thành',
            'ten' => 'Tên tỉnh thành',
        ];
    }
}
