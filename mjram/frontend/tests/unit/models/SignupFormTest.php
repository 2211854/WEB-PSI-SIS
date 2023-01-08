<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
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

    public function testSignup()
    {
        $user = new User();

        $user->username = 'ricardo';
        $user->email = 'ricsantos2003@hotmail.com';
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->status = 10;
        $user->save();
        $auth = Yii::$app->authManager;
        $userRole = $auth->getRole('cliente');
        $auth->assign($userRole, $user->getId());

        $user->save();
        $this->assertEquals('ricardo',$user->username);
        verify($user->username)->equals('ricardo');
    }

}
