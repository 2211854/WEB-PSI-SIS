<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property int $id
 * @property string $nome
 * @property int $stockatual
 * @property int $id_categoria
 * @property int $id_unidade
 *
 * @property CategoriaRecurso $categoria
 * @property PedidoRecurso[] $pedidoRecursos
 * @property Tarefa[] $tarefas
 * @property UnidadeMedida $unidade
 */
class Recurso extends \yii\db\ActiveRecord
{
    public $unidaded;
    public $categoriad;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'stockatual', 'id_categoria', 'id_unidade'], 'required'],
            [['stockatual', 'id_categoria', 'id_unidade'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => CategoriaRecurso::class, 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_unidade'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadeMedida::class, 'targetAttribute' => ['id_unidade' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'stockatual' => 'Stockatual',
            'id_categoria' => 'Categoria',
            'id_unidade' => 'Unidade',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(CategoriaRecurso::class, ['id' => 'id_categoria']);
    }

    /**
     * Gets query for [[PedidoRecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoRecursos()
    {
        return $this->hasMany(PedidoRecurso::class, ['id_recurso' => 'id']);
    }

    /**
     * Gets query for [[Tarefas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarefas()
    {
        return $this->hasMany(Tarefa::class, ['id_recurso' => 'id']);
    }

    /**
     * Gets query for [[Unidade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidade()
    {
        return $this->hasOne(UnidadeMedida::class, ['id' => 'id_unidade']);
    }
}
