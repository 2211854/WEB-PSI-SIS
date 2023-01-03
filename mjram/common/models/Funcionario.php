<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id
 * @property string $nib
 *
 * @property Utilizador $id0
 * @property PedidoRecurso[] $pedidoRecursos
 * @property Tarefa[] $tarefas
 * @property Tarefa[] $tarefas0
 * @property Voo[] $voos
 */
class Funcionario extends \yii\db\ActiveRecord
{
    public $username;
    public $email;
    public $nome;
    public $apelidos;
    public $role;
    public $telemovel;
    public $nif;
    public $cartaocidadao;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nib'], 'required'],
            [['id'], 'integer'],
            [['nib'], 'string', 'max' => 21],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nib' => 'Nib',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Utilizador::class, ['id' => 'id']);
    }

    function getuser() {
        return $this->hasOne(User::class, ['id' => 'id']);
    }

    function getUtilizador() {
        return $this->hasOne(Utilizador::class, ['id' => 'id']);
    }

    function getauth_assignment() {
        return Yii::$app->db ->createCommand("Select * from auth_assignment where user_id='id'")->queryOne();
    }


    /**
     * Gets query for [[PedidoRecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoRecursos()
    {
        return $this->hasMany(PedidoRecurso::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[Tarefas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarefas()
    {
        return $this->hasMany(Tarefa::class, ['id_funcionario_registo' => 'id']);
    }

    /**
     * Gets query for [[Tarefas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarefas0()
    {
        return $this->hasMany(Tarefa::class, ['id_funcionario_responsavel' => 'id']);
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['id_funcionario' => 'id']);
    }
}
