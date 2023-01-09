<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class CreateEmployeeCest
{
    public function _before(FunctionalTester $I)
    {
        $admin = \common\models\User::findByUsername('administrador');
        $I->amLoggedInAs($admin);
    }

    // tests
    public function CreateEmployee(FunctionalTester $I)
    {
        $I->amOnRoute('/funcionario/create');
        $I->fillField('Utilizador[username]', 'teste1');
        $I->fillField('Utilizador[email]', 'teste1@hotmail.com');
        $I->fillField('Utilizador[password]', '12345678');
        $I->selectOption('Utilizador[role]', 'gestorLogistica');
        $I->fillField('Utilizador[nome]', 'test1');
        $I->fillField('Utilizador[apelidos]', 'Santos');
        $I->fillField('Funcionario[nib]', 'PT500007851752778');
        $I->fillField('Utilizador[telemovel]', '912456934');
        $I->fillField('Utilizador[nif]', '254584381');
        $I->fillField('Utilizador[cartaocidadao]', '498123745');
        $I->click('Save');
    }

}
