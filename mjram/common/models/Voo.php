<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "voo".
 *
 * @property int $id
 * @property string $designacao
 * @property string $data_registo
 * @property string $estado
 * @property int $id_aviao
 * @property int $id_pista
 * @property int $id_funcionario
 *
 * @property Aviao $aviao
 * @property Classe[] $classes
 * @property DetalheVoo[] $detalheVoos
 * @property EscalaVoo[] $escalaVoos
 * @property Funcionario $funcionario
 * @property ItemVenda[] $itemVendas
 * @property Pista $pista
 * @property Tarefa[] $tarefas
 */
class Voo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'id_aviao', 'id_pista', 'id_funcionario'], 'required'],
            [['data_registo'], 'safe'],
            [['estado'], 'string'],
            [['id_aviao', 'id_pista', 'id_funcionario'], 'integer'],
            [['designacao'], 'string', 'max' => 20],
            [['id_aviao'], 'exist', 'skipOnError' => true, 'targetClass' => Aviao::class, 'targetAttribute' => ['id_aviao' => 'id']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::class, 'targetAttribute' => ['id_funcionario' => 'id']],
            [['id_pista'], 'exist', 'skipOnError' => true, 'targetClass' => Pista::class, 'targetAttribute' => ['id_pista' => 'id']],
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
            'estado' => 'Estado',
            'id_aviao' => 'Aviao',
            'id_pista' => 'Pista',
            'id_funcionario' => 'Id Funcionario',
        ];
    }

    /**
     * Gets query for [[Aviao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviao()
    {
        return $this->hasOne(Aviao::class, ['id' => 'id_aviao']);
    }

    /**
     * Gets query for [[Classes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classe::class, ['id' => 'id_classe'])->viaTable('detalhe_voo', ['id_voo' => 'id']);
    }

    /**
     * Gets query for [[DetalheVoos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalheVoos()
    {
        return $this->hasMany(DetalheVoo::class, ['id_voo' => 'id']);
    }

    /**
     * Gets query for [[EscalaVoos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscalaVoos()
    {
        return $this->hasMany(EscalaVoo::class, ['id_voo' => 'id']);
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
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::class, ['id_voo' => 'id']);
    }

    /**
     * Gets query for [[Pista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPista()
    {
        return $this->hasOne(Pista::class, ['id' => 'id_pista']);
    }

    /**
     * Gets query for [[Tarefas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarefas()
    {
        return $this->hasMany(Tarefa::class, ['id_voo' => 'id']);
    }
}
