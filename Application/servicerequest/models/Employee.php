<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $emp_name
 * @property string $position
 * @property integer $department_id
 * @property integer $position_id
 * @property integer $shift_id
 *
 * @property Department $department
 * @property Position $position0
 * @property Shift $shift
 * @property Shift[] $shifts
 * @property Ticket[] $tickets
 * @property Ticket[] $tickets0
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_name', 'position', 'shift_id'], 'required'],
            [['shift_id'], 'integer'],
            [['emp_name'], 'string', 'max' => 120],
            [['position'], 'string', 'max' => 45],
          //  [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
           [['shift_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shift::className(), 'targetAttribute' => ['shift_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_name' => 'Employee Name',
           // 'position' => 'Position',
          //  'department_id' => 'Department ID',
           // 'position_id' => 'Position ID',
            //'shift_id' => 'Shift ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getPosition0()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(Shift::className(), ['id' => 'shift_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   /* public function getShifts()
    {
        return $this->hasMany(Shift::className(), ['supervisor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['employee_respond_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getTickets0()
    {
        return $this->hasMany(Ticket::className(), ['employee_create_id' => 'id']);
    }
    */
}
