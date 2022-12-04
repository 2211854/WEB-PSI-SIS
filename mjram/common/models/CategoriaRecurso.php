<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria_recurso".
 *
 * @property int $id
 * @property string $designacao
 *
 * @property Recurso[] $recursos
 */
class CategoriaRecurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_recurso';
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
     * Gets query for [[Recursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::class, ['id_categoria' => 'id']);
    }
}
