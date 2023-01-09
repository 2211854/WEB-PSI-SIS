<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recurso;

/**
 * RecursoSearch represents the model behind the search form of `common\models\Recurso`.
 */
class RecursoSearch extends Recurso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stockatual', 'id_categoria', 'id_unidade'], 'integer'],
            [['nome','unidaded','categoriad'], 'safe'],
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
        $query = Recurso::find()->joinWith(['categoria','unidade']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['nome','stockatual','unidaded','categoriad']],
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
            'stockatual' => $this->stockatual,
            'id_categoria' => $this->id_categoria,
            'id_unidade' => $this->id_unidade,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
                ->andFilterWhere(['like', 'categoria_recurso.designacao', $this->categoriad])
            ->andFilterWhere(['like', 'unidade_medida.designacao', $this->unidaded]);

        return $dataProvider;
    }
}
