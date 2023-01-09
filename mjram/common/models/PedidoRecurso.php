<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pedido_recurso".
 *
 * @property int $id
 * @property int $quantidade
 * @property string $data_registo
 * @property int $custo_total
 * @property int $id_recurso
 * @property int $id_funcionario
 * @property string $estado
 *
 * @property Funcionario $funcionario
 * @property Recurso $recurso
 */
class PedidoRecurso extends \yii\db\ActiveRecord
{
    public $recursod;
    public $funcionariod;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido_recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'custo_total', 'id_recurso', 'id_funcionario'], 'required'],
            [['quantidade', 'custo_total', 'id_recurso', 'id_funcionario'], 'integer'],
            [['data_registo'], 'safe'],
            [['estado'], 'string'],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::class, 'targetAttribute' => ['id_funcionario' => 'id']],
            [['id_recurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::class, 'targetAttribute' => ['id_recurso' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantidade' => 'Quantidade',
            'data_registo' => 'Data Registo',
            'custo_total' => 'Custo Total',
            'id_recurso' => 'Recurso',
            'id_funcionario' => 'Funcionario',
            'estado' => 'Estado',
        ];
    }
    /**
     * Gets query for [[Utilizador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getutilizador()
    {
        return $this->hasOne(Utilizador::class, ['id' => 'id_funcionario']);
    }
    /**
     * Gets query for [[Funcionario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::class, ['id' => 'id_funcionario']);
    }

    /**
     * Gets query for [[Recurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecurso()
    {
        return $this->hasOne(Recurso::class, ['id' => 'id_recurso']);
    }
}
