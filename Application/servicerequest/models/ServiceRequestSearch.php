<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servicerequest;

/**
 * ServiceRequestSearch represents the model behind the search form about `app\models\Servicerequest`.
 */
class ServiceRequestSearch extends Servicerequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['request_title', 'request_details', 'room_no', 'assigned_to', 'date', 'request_status'], 'safe'],
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
        $query = Servicerequest::find();

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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'request_title', $this->request_title])
            ->andFilterWhere(['like', 'request_details', $this->request_details])
            ->andFilterWhere(['like', 'room_no', $this->room_no])
            ->andFilterWhere(['like', 'assigned_to', $this->assigned_to])
            ->andFilterWhere(['like', 'request_status', $this->request_status]);

        return $dataProvider;
    }
}
