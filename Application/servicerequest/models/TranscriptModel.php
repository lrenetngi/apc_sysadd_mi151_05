<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transcript;

/**
 * TranscriptModel represents the model behind the search form about `app\models\Transcript`.
 */
class TranscriptModel extends Transcript
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'ticket_item_id', 'emp_resp_id', 'dept_resp_id', 'ticket_id1'], 'integer'],
            [['description', 'time'], 'safe'],
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
        $query = Transcript::find();

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
            'ticket_id' => $this->ticket_id,
            'ticket_item_id' => $this->ticket_item_id,
            'emp_resp_id' => $this->emp_resp_id,
            'dept_resp_id' => $this->dept_resp_id,
            'time' => $this->time,
            'ticket_id1' => $this->ticket_id1,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
