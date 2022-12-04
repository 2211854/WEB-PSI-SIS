<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classe".
 *
 * @property int $id
 * @property string $designacao
 *
 * @property Aviao[] $aviaos
 * @property DetalheVoo[] $detalheVoos
 * @property ItemVenda[] $itemVendas
 * @property Ocupacao[] $ocupacaos
 * @property Voo[] $voos
 */
class Classe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[Aviaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAviaos()
    {
        return $this->hasMany(Aviao::class, ['id' => 'id_aviao'])->viaTable('ocupacao', ['id_classe' => 'id']);
    }

    /**
     * Gets query for [[DetalheVoos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalheVoos()
    {
        return $this->hasMany(DetalheVoo::class, ['id_classe' => 'id']);
    }

    /**
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::class, ['id_classe' => 'id']);
    }

    /**
     * Gets query for [[Ocupacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcupacaos()
    {
        return $this->hasMany(Ocupacao::class, ['id_classe' => 'id']);
    }

    /**
     * Gets query for [[Voos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoos()
    {
        return $this->hasMany(Voo::class, ['id' => 'id_voo'])->viaTable('detalhe_voo', ['id_classe' => 'id']);
    }
}
