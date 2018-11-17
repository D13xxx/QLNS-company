<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $fullname
 * @property int $phong_ban_id
 * @property int $is_admin
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at','phan_quyen'], 'required'],
            [['status', 'created_at', 'updated_at', 'phong_ban_id', 'is_admin'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['fullname'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tên',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Mật khẩu',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
            'fullname' => 'Tên đầy đủ',
            'phong_ban_id' => 'Phòng ban',
            'is_admin' => 'Chức vụ',
            'phan_quyen'=> 'Phân quyền người dùng',
        ];
    }
}
