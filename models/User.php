<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string|null $role
 * @property string|null $username
 * @property string|null $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Not using access tokens? Return null.
        return null;
    }

    public function getId()
    {
        return $this->user_id; // adjust if your primary key is different
    }

    public function getAuthKey()
    {
        // Only used if you're doing "remember me" securely
        return null;
    }

    public function validateAuthKey($authKey)
    {
        // Same — skip or return false for now
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'username', 'password'], 'default', 'value' => null],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['role'], 'string', 'max' => 10],
            [['username', 'password'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'role' => 'Role',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}
