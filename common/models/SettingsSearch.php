<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Settings;

/**
 * SettingsSearch represents the model behind the search form of `backend\models\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone_number'], 'integer'],
            [['email', 'address', 'btn_text_home_page', 'footer', 'contact_information_text', 'project_description'], 'safe'],
            [['yandex_map_x', 'yandex_map_y'], 'number'],
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
        $query = Settings::find();

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
            'phone_number' => $this->phone_number,
            'yandex_map_x' => $this->yandex_map_x,
            'yandex_map_y' => $this->yandex_map_y,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'btn_text_home_page', $this->btn_text_home_page])
            ->andFilterWhere(['like', 'footer', $this->footer])
            ->andFilterWhere(['like', 'contact_information_text', $this->contact_information_text])
            ->andFilterWhere(['like', 'project_description', $this->project_description]);

        return $dataProvider;
    }
}
