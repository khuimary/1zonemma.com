<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Participants;

/**
 * ParticipantsSearch represents the model behind the search form of `app\models\Participants`.
 */
class ParticipantsSearch extends Participants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'totalfights'], 'integer'],
            [['country', 'academy', 'username', 'cityofresidence', 'dateofbirth', 'email', 'fullsizephoto', 'gender', 'givenname', 'handreach', 'handsize', 'height', 'weight', 'instagramlink', 'losses', 'mmarecord', 'videourllink', 'wins'], 'safe'],
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
        $query = Participants::find();

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
            'userid' => $this->userid,
            'totalfights' => $this->totalfights,
        ]);

        $query->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'academy', $this->academy])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'cityofresidence', $this->cityofresidence])
            ->andFilterWhere(['like', 'dateofbirth', $this->dateofbirth])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fullsizephoto', $this->fullsizephoto])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'givenname', $this->givenname])
            ->andFilterWhere(['like', 'handreach', $this->handreach])
            ->andFilterWhere(['like', 'handsize', $this->handsize])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'instagramlink', $this->instagramlink])
            ->andFilterWhere(['like', 'losses', $this->losses])
            ->andFilterWhere(['like', 'mmarecord', $this->mmarecord])
            ->andFilterWhere(['like', 'videourllink', $this->videourllink])
            ->andFilterWhere(['like', 'wins', $this->wins]);

        return $dataProvider;
    }
}
