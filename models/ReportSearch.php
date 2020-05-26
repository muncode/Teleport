<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReportSearch represents the model behind the search form of `app\models\Report`.
 */
class ReportSearch extends Report
{
    public $name;
    public $phone;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'summ', 'act', 'phone'], 'integer'],
            [['date', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Report::find();

        $query->joinWith(['users']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['date','user_id','act','name','phone']],
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
            'user_id' => $this->user_id,
            'summ' => $this->summ,
            'act' => $this->act,
        ]);

        $query->andFilterWhere(['LIKE', 'users.name', $this->name]);
        $query->andFilterWhere(['LIKE', 'users.phone', $this->phone]);

        return $dataProvider;
    }
}
