<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class CreatePlaneCest
{
    public function _before(FunctionalTester $I)
    {
        $admin = \common\models\User::findByUsername('administrador');
        $I->amLoggedInAs($admin);
    }

    // tests
    public function CreatePlane(FunctionalTester $I)
    {
        $I->amOnRoute('/aviao/create');
        $I->amGoingTo('Tentar colocar tudo');
        $I->fillField('Aviao[marca]', 'Airbus');
        $I->fillField('Aviao[modelo]', 'A380');
        $I->fillField('Aviao[combustivelmaximo]', '500000');
        $I->fillField('Aviao[combustivelatual]', '380000');
        $I->selectOption('Aviao[estado]', 'Operacional');
        $I->selectOption('Aviao[id_companhia]', 'Qatar Airways');
        $I->click('Save');
    }
    public function CreateOcupation(FunctionalTester $I)
    {
        $I->amOnRoute('/ocupacao/create?aviaoid=1');
        $I->amGoingTo('Tentar colocar a ocupacao');
        $I->fillField('Ocupacao[ocupacao]', '240');
        $I->selectOption('Ocupacao[id_classe]', 'Primeira');
        $I->click('Save');
    }
}
