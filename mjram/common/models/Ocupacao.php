<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ocupacao".
 *
 * @property int $id
 * @property string $ocupacao
 * @property int $id_aviao
 * @property int $id_classe
 *
 * @property Aviao $aviao
 * @property Classe $classe
 */
class Ocupacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ocupacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocupacao', 'id_aviao', 'id_classe'], 'required'],
            [['id_aviao', 'id_classe'], 'integer'],
            [['ocupacao'], 'string', 'max' => 50],
            [['id_aviao', 'id_classe'], 'unique', 'targetAttribute' => ['id_aviao', 'id_classe']],
            [['id_aviao'], 'exist', 'skipOnError' => true, 'targetClass' => Aviao::class, 'targetAttribute' => ['id_aviao' => 'id']],
            [['id_classe'], 'exist', 'skipOnError' => true, 'targetClass' => Classe::class, 'targetAttribute' => ['id_classe' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ocupacao' => 'Ocupacao',
            'id_aviao' => 'Id Aviao',
            'id_classe' => 'Id classe',
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
     * Gets query for [[classe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasse()
    {
        return $this->hasOne(Classe::class, ['id' => 'id_classe']);
    }
}
