<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ton_giao".
 *
 * @property int $id
 * @property string $ten
 */
class TonGiao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ton_giao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'],'required'],
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
            'ten' => 'Tên Tôn giáo',
        ];
    }
}
