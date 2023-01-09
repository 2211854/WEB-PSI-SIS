<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use common\models\Cliente;
use common\models\Utilizador;
use frontend\models\SignupForm;
use common\models\User;
use Yii;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }
    public function testDeleteSignup()
    {
        $user = new User();
        $userUtilizador = new Utilizador();
        $userCliente = new Cliente();
        $user->username = 'ricardo';
        $user->email = 'ricsantos2003@hotmail.com';
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $userUtilizador->id_user = $user->getId();
        $userUtilizador->nif = '412784171';
        $userUtilizador->telemovel = '984127511';
        $userUtilizador->cartaocidadao = '984127511';
        $userUtilizador->apelidos = 'santos';
        $userUtilizador->nome =  'ricardo andré';
        $userUtilizador->save();

        $userCliente->passaporte = 'CS265436';
        $userCliente->id = $userUtilizador->id;
        $userCliente->save();

        $user->status = 10;
        $user->save();
        $auth = Yii::$app->authManager;
        $userRole = $auth->getRole('cliente');
        $auth->assign($userRole, $user->getId());

        $user->save();

        $model = Cliente::findOne($userCliente->id);
        verify($model->delete());
        $model = Utilizador::findOne($userUtilizador->id);
        verify($model->delete());
        $model = User::findOne($user->id);
        verify($model->delete());

    }
    public function testCreateSignup()
    {
        $user = new User();
        $userUtilizador = new Utilizador();
        $userCliente = new Cliente();
        $user->username = 'ricardo';
        $user->email = 'ricsantos2003@hotmail.com';
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $userUtilizador->id_user = $user->getId();
        $userUtilizador->nif = '412784171';
        $userUtilizador->telemovel = '984127511';
        $userUtilizador->cartaocidadao = '984127511';
        $userUtilizador->apelidos = 'santos';
        $userUtilizador->nome =  'ricardo andré';
        $userUtilizador->save();


        $userCliente->passaporte = 'CS265436';
        $userCliente->id = $userUtilizador->id;
        $userCliente->save();

        $user->status = 10;
        $user->save();
        $auth = Yii::$app->authManager;
        $userRole = $auth->getRole('cliente');
        $auth->assign($userRole, $user->getId());

        $user->save();
        $this->assertEquals('ricardo',$user->username);
        verify($user->username)->equals('ricardo');
    }

    public function testUpdateSignup()
    {
        $user = new User();
        $userUtilizador = new Utilizador();
        $userCliente = new Cliente();
        $user->username = 'ricardo';
        $user->email = 'ricsantos2003@hotmail.com';
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $userUtilizador->id_user = $user->getId();
        $userUtilizador->nif = '412784171';
        $userUtilizador->telemovel = '984127511';
        $userUtilizador->cartaocidadao = '984127511';
        $userUtilizador->apelidos = 'santos';
        $userUtilizador->nome =  'ricardo andré';
        $userUtilizador->save();


        $userCliente->passaporte = 'CS265436';
        $userCliente->id = $userUtilizador->id;
        $userCliente->save();

        $user->status = 10;
        $user->save();
        $auth = Yii::$app->authManager;
        $userRole = $auth->getRole('cliente');
        $auth->assign($userRole, $user->getId());

        $user->save();

        $model = Utilizador::findOne($user->id);
        $model->nome = 'Manuel Santos';
        $model->apelidos = 'Santos';

        $model->save();

        $this->assertEquals('Manuel Santos', $model->nome);
        $this->assertEquals('Santos', $model->apelidos);
    }

}
