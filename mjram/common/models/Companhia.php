<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companhia".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Aviao[] $aviaos
 */
class Companhia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companhia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * Gets query for [[Aviaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviaos()
    {
        return $this->hasMany(Aviao::class, ['id_companhia' => 'id']);
    }
}
