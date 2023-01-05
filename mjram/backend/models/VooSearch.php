<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Voo;

/**
 * VooSearch represents the model behind the search form of `common\models\Voo`.
 */
class VooSearch extends Voo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_aviao', 'id_pista', 'id_funcionario'], 'integer'],
            [['designacao', 'data_registo', 'estado','aviaod','pistad','funcionariod'], 'safe'],
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
        $query = Voo::find()->joinWith(['aviao','pista','utilizador']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['designacao','data_registo','estado']],
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
            'id_aviao' => $this->id_aviao,
            'id_pista' => $this->id_pista,
            'id_funcionario' => $this->id_funcionario,
        ]);

        $query->andFilterWhere(['like', 'designacao', $this->designacao])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'aviao.designacao', $this->aviaod])
            ->andFilterWhere(['like', 'pista.designacao', $this->pistad])
            ->andFilterWhere(['like', 'utilizador.nome', $this->funcionariod]);

        return $dataProvider;
    }
}
