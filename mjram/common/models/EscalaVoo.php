<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "escala_voo".
 *
 * @property int $id
 * @property string $partida
 * @property string $destino
 * @property string $horario_partida
 * @property string $horario_chegada
 * @property int $id_voo
 *
 * @property Voo $voo
 */
class EscalaVoo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escala_voo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partida', 'destino', 'horario_partida', 'horario_chegada', 'id_voo'], 'required'],
            [['horario_partida', 'horario_chegada'], 'safe'],
            [['id_voo'], 'integer'],
            [['partida', 'destino'], 'string', 'max' => 50],
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
            'partida' => 'Partida',
            'destino' => 'Destino',
            'horario_partida' => 'Horario Partida',
            'horario_chegada' => 'Horario Chegada',
            'id_voo' => 'Id Voo',
        ];
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
