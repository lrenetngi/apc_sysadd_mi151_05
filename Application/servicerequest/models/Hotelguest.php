<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotelguest".
 *
 * @property integer $id
 * @property string $guest_lastname
 * @property string $guest_firstname
 * @property string $guest_contactno
 * @property string $guest_email
 *
 * @property Room[] $rooms
 * @property Servicerequest[] $servicerequests
 */
class Hotelguest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotelguest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guest_lastname', 'guest_firstname', 'guest_email'], 'string', 'max' => 45],
            [['guest_contactno'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_lastname' => 'Guest Lastname',
            'guest_firstname' => 'Guest Firstname',
            'guest_contactno' => 'Guest Contactno',
            'guest_email' => 'Guest Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['hotelguest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicerequests()
    {
        return $this->hasMany(Servicerequest::className(), ['hotelguest_id' => 'id']);
    }
}
