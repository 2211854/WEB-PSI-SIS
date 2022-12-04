<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "utilizador".
 *
 * @property int $id
 * @property int $telemovel
 * @property string $palavrapasse
 * @property string $email
 * @property string $nif
 * @property string $nome
 * @property string $apelidos
 * @property int $cartaocidadao
 * @property int $id_user
 * @property string $data_registo
 *
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property User $user
 */
class Utilizador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilizador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telemovel', 'palavrapasse', 'email', 'nif', 'nome', 'apelidos', 'cartaocidadao', 'id_user'], 'required'],
            [['telemovel', 'cartaocidadao', 'id_user'], 'integer'],
            [['data_registo'], 'safe'],
            [['palavrapasse'], 'string', 'max' => 256],
            [['email'], 'string', 'max' => 200],
            [['nif'], 'string', 'max' => 9],
            [['nome', 'apelidos'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telemovel' => 'Telemovel',
            'palavrapasse' => 'Palavrapasse',
            'email' => 'Email',
            'nif' => 'Nif',
            'nome' => 'Nome',
            'apelidos' => 'Apelidos',
            'cartaocidadao' => 'Cartaocidadao',
            'id_user' => 'Id User',
            'data_registo' => 'Data Registo',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[Funcionario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::class, ['id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
