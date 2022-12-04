<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hangar".
 *
 * @property int $id
 * @property string $designacao
 *
 * @property Tarefa[] $tarefas
 */
class Hangar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hangar';
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
     * Gets query for [[Tarefas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarefas()
    {
        return $this->hasMany(Tarefa::class, ['id_hangar' => 'id']);
    }
}
