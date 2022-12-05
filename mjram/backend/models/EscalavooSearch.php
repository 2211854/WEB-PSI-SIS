<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EscalaVoo;

/**
 * EscalavooSearch represents the model behind the search form of `common\models\EscalaVoo`.
 */
class EscalavooSearch extends EscalaVoo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_voo'], 'integer'],
            [['partida', 'destino', 'horario_partida', 'horario_chegada'], 'safe'],
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
        $query = EscalaVoo::find();

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
            'horario_partida' => $this->horario_partida,
            'horario_chegada' => $this->horario_chegada,
            'id_voo' => $this->id_voo,
        ]);

        $query->andFilterWhere(['like', 'partida', $this->partida])
            ->andFilterWhere(['like', 'destino', $this->destino]);

        return $dataProvider;
    }
}
