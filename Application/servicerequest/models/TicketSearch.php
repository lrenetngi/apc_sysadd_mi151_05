<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `app\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'escalation_level', 'check_in_id', 'employee_respond_id', 'department_id', 'category_id', 'employee_create_id'], 'integer'],
            [['request_title', 'status', 'time_start', 'time_end', 'time_alloted', 'desc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ticket::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'time_alloted' => $this->time_alloted,
            'escalation_level' => $this->escalation_level,
            'check_in_id' => $this->check_in_id,
            'employee_respond_id' => $this->employee_respond_id,
            'department_id' => $this->department_id,
            'category_id' => $this->category_id,
            'employee_create_id' => $this->employee_create_id,
        ]);

        $query->andFilterWhere(['like', 'request_title', $this->request_title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
