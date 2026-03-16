<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Hausaufgabe".
 *
 * @property int $ID
 * @property string $Titel
 * @property string|null $Beschr
 * @property string|null $Fachname
 * @property int|null $Erledigt
 * @property string|null $Faelligkeitsdatum
 *
 * @property Faecher $fachname
 */
class Hausaufgabe extends \yii\db\ActiveRecord
{
    public $Lname;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Hausaufgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Titel'], 'required'],
            [['Beschr'], 'string'],
            [['Fachname'], 'string', 'max' => 50],
            [['Erledigt'], 'integer'],
            [['Faelligkeitsdatum'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Titel' => 'Titel',
            'Beschr' => 'Beschr',
            'Fachname' => 'Fachname',
            'Erledigt' => 'Erledigt',
            'Faelligkeitsdatum' => 'Faelligkeitsdatum',
        ];
    }

    /**
     * Gets query for [[Fachname]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFachname()
    {
        return $this->hasOne(Faecher::class, ['name' => 'Fachname']);
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['ID' => 'user_id']);
    }

    public function getLehrer()
    {
        return $this->hasOne(User::class, ['LID' => 'LehrerID']); // 'LehrerID' in Hausaufgabe Tabelle
    }public static function fachListe()
{
    return [
        'INSY' => 'INSY',
        'ITSI' => 'ITSI',
        'BS' => 'BS',
        'SYT' => 'SYT',
        'SYTU' => 'SYTU',
        'Deutsch' => 'Deutsch',
        'Englisch' => 'Englisch',
    ];
}
}



