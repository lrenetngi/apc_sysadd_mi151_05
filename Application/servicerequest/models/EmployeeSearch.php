<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['servEmployee_lname', 'servEmployee_fname', 'servEmployee_status'], 'safe'],
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
        $query = Employee::find();

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
        ]);

        $query->andFilterWhere(['like', 'servEmployee_lname', $this->servEmployee_lname])
            ->andFilterWhere(['like', 'servEmployee_fname', $this->servEmployee_fname])
            ->andFilterWhere(['like', 'servEmployee_status', $this->servEmployee_status]);

        return $dataProvider;
    }
}
