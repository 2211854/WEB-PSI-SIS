<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalhe_voo".
 *
 * @property int $id
 * @property int $preço
 * @property int $id_voo
 * @property int $id_classe
 *
 * @property Classe $classe
 * @property Voo $voo
 */
class DetalheVoo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalhe_voo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preço', 'id_voo', 'id_classe'], 'required'],
            [['preço', 'id_voo', 'id_classe'], 'integer'],
            [['id_voo', 'id_classe'], 'unique', 'targetAttribute' => ['id_voo', 'id_classe']],
            [['id_classe'], 'exist', 'skipOnError' => true, 'targetClass' => Classe::class, 'targetAttribute' => ['id_classe' => 'id']],
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
            'preço' => 'Preço',
            'id_voo' => 'Voo',
            'id_classe' => 'Classe',
        ];
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
