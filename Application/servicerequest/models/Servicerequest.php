<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicerequest".
 *
 * @property integer $id
 * @property string $request_title
 * @property string $request_details
 * @property string $room_no
 * @property string $assigned_to
 * @property string $date
 * @property string $request_status
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
            [['request_title', 'request_details', 'room_no', 'assigned_to', 'date', 'request_status'], 'required'],
            [['request_details'], 'string'],
            [['date'], 'safe'],
            [['request_title', 'room_no'], 'string', 'max' => 40],
            [['assigned_to'], 'string', 'max' => 30],
            [['request_status'], 'string', 'max' => 45],
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
            'room_no' => 'Room No',
            'assigned_to' => 'Assigned To',
            'date' => 'Date',
            'request_status' => 'Request Status',
        ];
    }
}
