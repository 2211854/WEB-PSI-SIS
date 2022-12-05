<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tarefa;

/**
 * TarefaSearch represents the model behind the search form of `common\models\Tarefa`.
 */
class TarefaSearch extends Tarefa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_voo', 'id_hangar', 'id_recurso', 'id_funcionario_registo', 'id_funcionario_responsavel'], 'integer'],
            [['designacao', 'data_registo', 'data_inicio', 'data_conclusao', 'estado'], 'safe'],
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
        $query = Tarefa::find();

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
            'data_registo' => $this->data_registo,
            'data_inicio' => $this->data_inicio,
            'data_conclusao' => $this->data_conclusao,
            'id_voo' => $this->id_voo,
            'id_hangar' => $this->id_hangar,
            'id_recurso' => $this->id_recurso,
            'id_funcionario_registo' => $this->id_funcionario_registo,
            'id_funcionario_responsavel' => $this->id_funcionario_responsavel,
        ]);

        $query->andFilterWhere(['like', 'designacao', $this->designacao])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
