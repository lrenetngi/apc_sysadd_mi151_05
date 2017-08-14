<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicerequest".
 *
 * @property integer $id
 * @property string $request_title
 * @property string $request_details
 * @property string $request_category
 * @property string $room_no
 * @property string $request_status
 * @property string $date_started
 * @property string $date_finished
 * @property integer $hotelguest_id
 * @property integer $employee_id
 *
 * @property Employee $employee
 * @property Hotelguest $hotelguest
 */
class Servicerequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicerequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_started', 'date_finished'], 'safe'],
            [['hotelguest_id', 'employee_id'], 'required'],
            [['hotelguest_id', 'employee_id'], 'integer'],
            [['request_title', 'request_details', 'request_category'], 'string', 'max' => 45],
            [['room_no', 'request_status'], 'string', 'max' => 20],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['hotelguest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotelguest::className(), 'targetAttribute' => ['hotelguest_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_title' => 'Request Title',
            'request_details' => 'Request Details',
            'request_category' => 'Request Category',
            'room_no' => 'Room No',
            'request_status' => 'Request Status',
            'date_started' => 'Date Started',
            'date_finished' => 'Date Finished',
            'hotelguest_id' => 'Hotelguest ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelguest()
    {
        return $this->hasOne(Hotelguest::className(), ['id' => 'hotelguest_id']);
    }
}
