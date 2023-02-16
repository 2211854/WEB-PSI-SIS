<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $passaporte
 *
 * @property Utilizador $id0
 * @property Venda[] $vendas
 */
class Cliente extends \yii\db\ActiveRecord
{


    public $password;
    public $newpassword;
    public $newpassword2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'passaporte'], 'required'],
            [['id'], 'integer'],
            [['passaporte'], 'string', 'max' => 11],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['id' => 'id']],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['newpassword', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['newpassword2', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
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
            'password' => 'Password atual',
            'newpassword' => 'Nova password',
            'newpassword2' => 'Repetir nova password',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Utilizador::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Vendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::class, ['id_cliente' => 'id']);
    }
}
