<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\School;

/**
 * SchoolSearch represents the model behind the search form about `backend\models\School`.
 */
class SchoolSearch extends School
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Status'], 'integer'],
            [['username','SchoolName', 'auth_key', 'password_hash', 'password_reset_token', 'Email', 'Phone', 'Website', 'Address', 'State', 'Country', 'PinCode', 'Latitude', 'Longitude', 'LogoImgURL', 'CreatedDate', 'Description', 'UpdatedDate'], 'safe'],
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
        $query = School::find()->orderby('CreatedDate DESC');

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
            'Id' => $this->Id,
            'Status' => $this->Status,
            'CreatedDate' => $this->CreatedDate,
            'UpdatedDate' => $this->UpdatedDate,
        ]);

        $query->andFilterWhere(['like', 'SchoolName', $this->SchoolName])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Phone', $this->Phone])
            ->andFilterWhere(['like', 'Website', $this->Website])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'PinCode', $this->PinCode])
            ->andFilterWhere(['like', 'LogoImgURL', $this->LogoImgURL]);

        return $dataProvider;
    }
}
