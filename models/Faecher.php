<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Faecher".
 *
 * @property string $name
 *
 * @property Hausaufgabe[] $hausaufgabes
 * @property Lehrer[] $lehrers
 */
class Faecher extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Faecher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Hausaufgabes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHausaufgabes()
    {
        return $this->hasMany(Hausaufgabe::class, ['Fachname' => 'name']);
    }

    /**
     * Gets query for [[Lehrers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLehrers()
    {
        return $this->hasMany(Lehrer::class, ['Fach' => 'name']);
    }

}
