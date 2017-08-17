<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "check_in".
 *
 * @property integer $id
 * @property string $check_in
 * @property string $check_out
 * @property integer $room_id
 * @property integer $customer_id
 *
 * @property Customer $customer
 * @property Room $room
 * @property Ticket[] $tickets
 */
class CheckIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['check_in', 'check_out', 'room_id', 'customer_id'], 'required'],
            [['check_in', 'check_out'], 'safe'],
            [['room_id', 'customer_id'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'check_in' => 'Check In',
            'check_out' => 'Check Out',
            'room_id' => 'Room ID',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['check_in_id' => 'id']);
    }
}
