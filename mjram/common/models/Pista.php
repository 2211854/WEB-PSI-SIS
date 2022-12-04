<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pista".
 *
 * @property int $id
 * @property string $designacao
 * @property int $comprimento
 * @property int $largura
 * @property string $estado
 *
 * @property Voo[] $voos
 */
class Pista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'comprimento', 'largura'], 'required'],
            [['comprimento', 'largura'], 'integer'],
            [['estado'], 'string'],
            [['designacao'], 'string', 'max' => 50],
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
            'comprimento' => 'Comprimento',
            'largura' => 'Largura',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['id_pista' => 'id']);
    }
}
