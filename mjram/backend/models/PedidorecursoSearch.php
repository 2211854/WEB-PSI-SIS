<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PedidoRecurso;

/**
 * PedidorecursoSearch represents the model behind the search form of `common\models\PedidoRecurso`.
 */
class PedidorecursoSearch extends PedidoRecurso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantidade', 'custo_total', 'id_recurso', 'id_funcionario'], 'integer'],
            [['data_registo', 'estado','funcionariod','recursod'], 'safe'],
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
        $query = PedidoRecurso::find()->joinWith(['recurso','utilizador']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['id','quantidade','data_registo','custo_total','estado','recursod','funcionariod']],
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
            'quantidade' => $this->quantidade,
            'data_registo' => $this->data_registo,
            'custo_total' => $this->custo_total,
            'id_recurso' => $this->id_recurso,
            'id_funcionario' => $this->id_funcionario,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'recurso.nome', $this->recursod])
            ->andFilterWhere(['like', 'utilizador.nome', $this->funcionariod]);

        return $dataProvider;
    }
}
