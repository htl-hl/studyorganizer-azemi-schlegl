<?php
namespace app\models;

use yii\db\ActiveRecord;

class Lehrer extends ActiveRecord
{
    public static function tableName()
    {
        return 'Lehrer';
    }
}