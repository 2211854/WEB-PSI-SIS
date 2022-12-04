<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tarefa".
 *
 * @property int $id
 * @property string $designacao
 * @property string $data_registo
 * @property string|null $data_inicio
 * @property string|null $data_conclusao
 * @property string $estado
 * @property int $id_voo
 * @property int|null $id_hangar
 * @property int|null $id_recurso
 * @property int $id_funcionario_registo
 * @property int|null $id_funcionario_responsavel
 *
 * @property Funcionario $funcionarioRegisto
 * @property Funcionario $funcionarioResponsavel
 * @property Hangar $hangar
 * @property Recurso $recurso
 * @property Voo $voo
 */
class Tarefa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarefa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'id_voo', 'id_funcionario_registo'], 'required'],
            [['data_registo', 'data_inicio', 'data_conclusao'], 'safe'],
            [['estado'], 'string'],
            [['id_voo', 'id_hangar', 'id_recurso', 'id_funcionario_registo', 'id_funcionario_responsavel'], 'integer'],
            [['designacao'], 'string', 'max' => 100],
            [['id_funcionario_registo'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::class, 'targetAttribute' => ['id_funcionario_registo' => 'id']],
            [['id_funcionario_responsavel'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::class, 'targetAttribute' => ['id_funcionario_responsavel' => 'id']],
            [['id_hangar'], 'exist', 'skipOnError' => true, 'targetClass' => Hangar::class, 'targetAttribute' => ['id_hangar' => 'id']],
            [['id_recurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::class, 'targetAttribute' => ['id_recurso' => 'id']],
            [['id_voo'], 'exist', 'skipOnError' => true, 'targetClass' => Voo::class, 'targetAttribute' => ['id_voo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designacao' => 'Designacao',
            'data_registo' => 'Data Registo',
            'data_inicio' => 'Data Inicio',
            'data_conclusao' => 'Data Conclusao',
            'estado' => 'Estado',
            'id_voo' => 'Id Voo',
            'id_hangar' => 'Id Hangar',
            'id_recurso' => 'Id Recurso',
            'id_funcionario_registo' => 'Id Funcionario Registo',
            'id_funcionario_responsavel' => 'Id Funcionario Responsavel',
        ];
    }

    /**
     * Gets query for [[FuncionarioRegisto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioRegisto()
    {
        return $this->hasOne(Funcionario::class, ['id' => 'id_funcionario_registo']);
    }

    /**
     * Gets query for [[FuncionarioResponsavel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioResponsavel()
    {
        return $this->hasOne(Funcionario::class, ['id' => 'id_funcionario_responsavel']);
    }

    /**
     * Gets query for [[Hangar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHangar()
    {
        return $this->hasOne(Hangar::class, ['id' => 'id_hangar']);
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

    /**
     * Gets query for [[Voo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoo()
    {
        return $this->hasOne(Voo::class, ['id' => 'id_voo']);
    }
}
