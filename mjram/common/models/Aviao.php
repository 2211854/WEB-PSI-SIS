<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aviao".
 *
 * @property int $id
 * @property string|null $designacao
 * @property string $marca
 * @property string $modelo
 * @property int $combustivelatual
 * @property int $combustivelmaximo
 * @property string $data_registo
 * @property string $estado
 * @property int $id_companhia
 *
 * @property Classe[] $classes
 * @property Companhia $companhia
 * @property Ocupacao[] $ocupacaos
 * @property Voo[] $voos
 */
class Aviao extends \yii\db\ActiveRecord
{
    public $sigla;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aviao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'combustivelatual', 'combustivelmaximo', 'id_companhia'], 'required'],
            [['combustivelatual', 'combustivelmaximo', 'id_companhia'], 'integer'],
            [['data_registo'], 'safe'],
            [['estado'], 'string'],
            [['designacao'], 'string', 'max' => 20],
            [['marca', 'modelo'], 'string', 'max' => 50],
            [['id_companhia'], 'exist', 'skipOnError' => true, 'targetClass' => Companhia::class, 'targetAttribute' => ['id_companhia' => 'id']],
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
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'combustivelatual' => 'Combustivel Atual',
            'combustivelmaximo' => 'Combustivel Maximo',
            'data_registo' => 'Data Registo',
            'estado' => 'Estado',
            'id_companhia' => 'Companhia',
        ];
    }

    /**
     * Gets query for [[Classes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classe::class, ['id' => 'id_classe'])->viaTable('ocupacao', ['id_aviao' => 'id']);
    }

    /**
     * Gets query for [[Companhia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanhia()
    {
        return $this->hasOne(Companhia::class, ['id' => 'id_companhia']);
    }

    /**
     * Gets query for [[Ocupacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcupacaos()
    {
        return $this->hasMany(Ocupacao::class, ['id_aviao' => 'id']);
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['id_aviao' => 'id']);
    }
}
