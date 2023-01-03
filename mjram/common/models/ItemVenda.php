<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "item_venda".
 *
 * @property int $id
 * @property string $passaporte
 * @property int $id_venda
 * @property int $id_classe
 * @property int $id_voo
 *
 * @property Classe $classe
 * @property Venda $venda
 * @property Voo $voo
 */
class ItemVenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passaporte', 'id_venda', 'id_classe', 'id_voo'], 'required'],
            [['id_venda', 'id_classe', 'id_voo'], 'integer'],
            [['passaporte'], 'string', 'max' => 11],
            [['passaporte', 'id_voo'], 'unique', 'targetAttribute' => ['passaporte', 'id_voo']],
            [['id_classe'], 'exist', 'skipOnError' => true, 'targetClass' => Classe::class, 'targetAttribute' => ['id_classe' => 'id']],
            [['id_venda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::class, 'targetAttribute' => ['id_venda' => 'id']],
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
            'passaporte' => 'Passaporte',
            'id_venda' => 'Id Venda',
            'id_classe' => 'Id classe',
            'id_voo' => 'Id Voo',
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
     * Gets query for [[Venda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenda()
    {
        return $this->hasOne(Venda::class, ['id' => 'id_venda']);
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
