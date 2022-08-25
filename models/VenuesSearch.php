<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venues;

/**
 * VenuesSearch represents the model behind the search form of `app\models\Venues`.
 */
class VenuesSearch extends Venues
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'locationid'], 'integer'],
            [['name', 'phoneno', 'howtogetthere', 'facebookpageurl', 'website', 'whentoarrive', 'createdat', 'amenities', 'description', 'alias'], 'safe'],
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
        $query = Venues::find();

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
            'locationid' => $this->locationid,
            'createdat' => $this->createdat,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phoneno', $this->phoneno])
            ->andFilterWhere(['like', 'howtogetthere', $this->howtogetthere])
            ->andFilterWhere(['like', 'facebookpageurl', $this->facebookpageurl])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'whentoarrive', $this->whentoarrive])
            ->andFilterWhere(['like', 'amenities', $this->amenities])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
