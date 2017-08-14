<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $servEmployee_lname
 * @property string $servEmployee_fname
 *
 * @property CustomerservicedeptHasEmployee[] $customerservicedeptHasEmployees
 * @property Customerservicedept[] $customerservicedepts
 * @property Servicerequest[] $servicerequests
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
            [['servEmployee_lname', 'servEmployee_fname'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'servEmployee_lname' => 'Serv Employee Lname',
            'servEmployee_fname' => 'Serv Employee Fname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerservicedeptHasEmployees()
    {
        return $this->hasMany(CustomerservicedeptHasEmployee::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerservicedepts()
    {
        return $this->hasMany(Customerservicedept::className(), ['id' => 'customerservicedept_id'])->viaTable('customerservicedept_has_employee', ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicerequests()
    {
        return $this->hasMany(Servicerequest::className(), ['employee_id' => 'id']);
    }
}
