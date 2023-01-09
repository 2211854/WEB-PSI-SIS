<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function blankLogin(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->see('Sign in');
        $I->amGoingTo('Tentar entrar sem com as labels em branco');
        $I->fillField('LoginForm[username]', '');
        $I->fillField('LoginForm[password]', '');
        $I->click('Sign In');
        $I->seeElement('.invalid-feedback');
        $I->seeElement('.invalid-feedback');
    }
    public function failLogin(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->amGoingTo('Tentar entrar com as credenciais erradas');
        $I->fillField('LoginForm[username]', 'administrador');
        $I->fillField('LoginForm[password]', '1234');
        $I->click('Sign In');
        //$I->see('Invalid login or password');
    }

    public function loginUser(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('LoginForm[username]', 'administrador');
        $I->fillField('LoginForm[password]', '12345678');
        $I->click('Sign In');
        $I->amGoingTo('sucess on login');
    }
}
