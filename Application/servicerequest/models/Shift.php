<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shift".
 *
 * @property integer $id
 * @property string $sched_start
 * @property string $sched_end
 * @property integer $department_id
 * @property integer $supervisor
 *
 * @property Employee[] $employees
 * @property Department $department
 * @property Employee $supervisor0
 */
class Shift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sched_start', 'sched_end', 'department_id', 'supervisor'], 'required'],
            [['sched_start', 'sched_end'], 'safe'],
            [['department_id', 'supervisor'], 'integer'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['supervisor'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['supervisor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sched_start' => 'Time In',
            'sched_end' => 'Time Out',
            'department_id' => 'Department ID',
            'supervisor' => 'Supervisor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['shift_id' => 'id']);
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
    public function getSupervisor0()
    {
        return $this->hasOne(Employee::className(), ['id' => 'supervisor']);
    }
    

}
