<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;

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

    public function testSignup()
    {
        $user = new User();
        $user->setUsername('Ricardo');
        $user->setEmail('ricsantos2003@hotmail.com');
        $user->setPassword('12345678');
        $user->save();
        $this->assertEquals('Ricardo',$user->username);
        verify($user->username)->equals('Ricardo');

        /*
     $user = new User();
     $user->setName('Ricardo');
     $user->setApelido('Santos');
     $user->setEmail('ricsantos2003@hotmail.com');
     $user->setUsername('Ricardo');
     $user->setTelemovel('912456934');
     $user->setPassword('12345678');
     $user->setPassport('CS265436');
     $user->setcartaoCidadao('498123745');
     $user->save();*/
        /*$user->tester->seeInDataBase('utilizador',[
           'nome' => 'Ricardo',
           'Apelido' => 'Santos',
           'email' => 'ricsantos2003@hotmail.com',
           'username'=> 'Ricardo',
           'Telemovel'=> '912456934',
           'password' => '12345678',
           'Passport'=> 'CS265436',
           'cartaoCidadao'=> '498123745',
       ]);*/


        /*$user = $model->signup();
        verify($user)->notEmpty();


        $user = $this->tester->grabRecord('common\models\User', [
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);
        $this->tester->seeRecord(
            'utilizador'
            ,['nome' => 'Ricardo',
            'Apelido' => 'Santos',
            'email' => 'ricsantos2003@hotmail.com',
            'username'=> 'Ricardo',
            'Telemovel'=> '912456934',
            'password' => '12345678',
            'Passport'=> 'CS265436',
            'cartaoCidadao'=> '498123745',
        ]);*/

    }

}
