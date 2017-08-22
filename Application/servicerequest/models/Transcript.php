<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transcript".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $ticket_item_id
 * @property integer $emp_resp_id
 * @property integer $dept_resp_id
 * @property string $description
 * @property string $time
 * @property integer $ticket_id1
 *
 * @property Ticket $ticketId1
 */
class Transcript extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transcript';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'ticket_item_id', 'emp_resp_id', 'dept_resp_id', 'description', 'ticket_id1'], 'required'],
            [['ticket_id', 'ticket_item_id', 'emp_resp_id', 'dept_resp_id', 'ticket_id1'], 'integer'],
            [['description'], 'string'],
            [['time'], 'safe'],
            [['ticket_id1'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id1' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'ticket_item_id' => 'Ticket Item ID',
            'emp_resp_id' => 'Emp Resp ID',
            'dept_resp_id' => 'Dept Resp ID',
            'description' => 'Description',
            'time' => 'Time',
            'ticket_id1' => 'Ticket Id1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketId1()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id1']);
    }
}
