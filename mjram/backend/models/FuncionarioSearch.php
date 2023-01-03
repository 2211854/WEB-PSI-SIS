<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Funcionario;

/**
 * FuncionarioSearch represents the model behind the search form of `common\models\Funcionario`.
 */
class FuncionarioSearch extends Funcionario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','telemovel','nif','cartaocidadao'], 'integer'],
            [['nib','username','email','nome','role','apelidos'], 'safe'],
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
        $query = Funcionario::find()->joinWith(['utilizador','user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['username','email','nib','nome','apelidos','telemovel','nif','cartaocidadao']],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['id' => $this->id,]);

        $query->andFilterWhere(['like', 'nib', $this->nib])
            ->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'utilizador.nome', $this->nome])
            ->andFilterWhere(['like', 'utilizador.apelidos', $this->apelidos])
            ->andFilterWhere(['like', 'utilizador.telemovel', $this->telemovel])
            ->andFilterWhere(['like', 'utilizador.nif', $this->nif])
            ->andFilterWhere(['like', 'utilizador.cartaocidadao', $this->cartaocidadao]);

        return $dataProvider;
    }
}
