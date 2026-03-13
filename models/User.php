<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $ID
 * @property string $Uname
 * @property string|null $g_Password
 * @property string $Password
 * @property string|null $role
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['g_Password'], 'default', 'value' => null],
            [['role'], 'default', 'value' => 'user'],
            [['Uname', 'Password'], 'required'],
            [['Uname'], 'string', 'max' => 50],
            [['g_Password', 'Password'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 20],
            [['Uname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Uname' => 'Uname',
            'g_Password' => 'G Password',
            'Password' => 'Password',
            'role' => 'Role',
        ];
    }

}
