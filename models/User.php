<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'User';
    }

    public function rules()
    {
        return [
            [['Uname', 'Password'], 'required'],
            [['Uname'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 20],
            [['Uname'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Uname' => 'Username',
            'Password' => 'Password',
            'role' => 'Role',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['ID' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['Uname' => $username]);
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function validatePassword($password)
    {
        return $this->Password === $password;
    }
}