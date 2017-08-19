<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $request_title
 * @property string $status
 * @property string $time_start
 * @property string $time_end
 * @property string $time_alloted
 * @property integer $escalation_level
 * @property string $desc
 * @property integer $check_in_id
 * @property integer $employee_respond_id
 * @property integer $department_id
 * @property integer $category_id
 * @property integer $employee_create_id
 *
 * @property Category $category
 * @property CheckIn $checkIn
 * @property Department $department
 * @property Employee $employeeRespond
 * @property Employee $employeeCreate
 * @property Transcript[] $transcripts
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'check_in_id', 'employee_respond_id', 'department_id', 'category_id', 'employee_create_id'], 'required'],
            [['time_start', 'time_end'], 'safe'],
            [['check_in_id', 'employee_respond_id', 'department_id', 'category_id', 'employee_create_id'], 'integer'],
            [['desc'], 'string'],
            [['request_title', 'status'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['check_in_id'], 'exist', 'skipOnError' => true, 'targetClass' => CheckIn::className(), 'targetAttribute' => ['check_in_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['employee_respond_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_respond_id' => 'id']],
            [['employee_create_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_create_id' => 'id']],
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
            'status' => 'Status',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'time_alloted' => 'Time Alloted',
            'escalation_level' => 'Escalation Level',
            'desc' => 'Description',
            'check_in_id' => 'Check In ID',
            'employee_respond_id' => 'Employee Respond ID',
            'department_id' => 'Department ID',
            'category_id' => 'Category',
            'employee_create_id' => 'Employee Create ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckIn()
    {
        return $this->hasOne(CheckIn::className(), ['id' => 'check_in_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeRespond()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_respond_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCreate()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_create_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranscripts()
    {
        return $this->hasMany(Transcript::className(), ['ticket_id1' => 'id']);
    }
}
