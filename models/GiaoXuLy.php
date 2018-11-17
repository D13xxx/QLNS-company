<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "giao_xu_ly".
 *
 * @property int $id
 * @property int $chuc_vu_id
 * @property int $phong_ban_id
 * @property string $dien_giai
 * @property int $ho_so_id
 * @property int $nhan_su_id
 * @property string $dinh_kem
 * @property string $ngay_bat_dau
 * @property string $ngay_ket_thuc
 */
class GiaoXuLy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giao_xu_ly';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chuc_vu_id', 'phong_ban_id', 'dien_giai', 'ho_so_id', 'nhan_su_id', 'dinh_kem', 'ngay_bat_dau', 'ngay_ket_thuc'], 'required'],
            [['chuc_vu_id', 'phong_ban_id', 'ho_so_id', 'nhan_su_id'], 'integer'],
            [['dien_giai'], 'string'],
            [['ngay_bat_dau', 'ngay_ket_thuc'], 'safe'],
            [['dinh_kem'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chuc_vu_id' => 'Chuc Vu ID',
            'phong_ban_id' => 'Phong Ban ID',
            'dien_giai' => 'Dien Giai',
            'ho_so_id' => 'Ho So ID',
            'nhan_su_id' => 'Nhan Su ID',
            'dinh_kem' => 'Dinh Kem',
            'ngay_bat_dau' => 'Ngay Bat Dau',
            'ngay_ket_thuc' => 'Ngay Ket Thuc',
        ];
    }
}
