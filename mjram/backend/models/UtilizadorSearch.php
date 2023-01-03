<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Utilizador;

/**
 * UtilizadorSearch represents the model behind the search form of `common\models\Utilizador`.
 */
class UtilizadorSearch extends Utilizador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'telemovel', 'cartaocidadao', 'id_user'], 'integer'],
            [['nif', 'nome', 'apelidos', 'data_registo'], 'safe'],
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
        $query = Utilizador::find();

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
            'telemovel' => $this->telemovel,
            'cartaocidadao' => $this->cartaocidadao,
            'id_user' => $this->id_user,
            'data_registo' => $this->data_registo,
        ]);

        $query->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'apelidos', $this->apelidos]);

        return $dataProvider;
    }
}
