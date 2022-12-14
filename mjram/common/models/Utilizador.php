<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "utilizador".
 *
 * @property int $id
 * @property int $telemovel
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
    public $username;
    public $email;
    public $password;
    public $role;
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
            [['telemovel', 'nif', 'nome', 'apelidos', 'cartaocidadao', 'id_user'], 'required'],
            [['telemovel', 'cartaocidadao', 'id_user'], 'integer'],
            [['data_registo'], 'safe'],
            [['nif'], 'string', 'max' => 9],
            [['nome', 'apelidos'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['role', 'required'],

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
