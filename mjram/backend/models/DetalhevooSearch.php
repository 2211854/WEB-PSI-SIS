<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetalheVoo;

/**
 * DetalhevooSearch represents the model behind the search form of `common\models\DetalheVoo`.
 */
class DetalhevooSearch extends DetalheVoo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'preço', 'id_voo', 'id_classe'], 'integer'],
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
        $query = DetalheVoo::find();

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
            'preço' => $this->preço,
            'id_voo' => $this->id_voo,
            'id_classe' => $this->id_classe,
        ]);

        return $dataProvider;
    }
}
