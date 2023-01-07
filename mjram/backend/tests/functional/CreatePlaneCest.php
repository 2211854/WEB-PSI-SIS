<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class CreatePlaneCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function CreatePlane(FunctionalTester $I)
    {
        $I->amOnRoute('/aviao/create');
        $I->fillField('Aviao[marca]', 'Airbus');
        $I->fillField('Aviao[modelo]', 'A380');
        $I->fillField('Aviao[combustivelmaximo]', '500000');
        $I->fillField('Aviao[combustivelatual]', '380000');
        $I->selectOption('Aviao[estado]', 'Operacional');
        $I->selectOption('Aviao[id_companhia]', 'Qatar Always');
        $I->click('Save');
    }
    public function CreateOcupation(FunctionalTester $I)
    {

        $I->amOnRoute('/ocupacao/create?aviaoid=1');
        $I->fillField('Ocupacao[ocupacao]', '240');
        $I->selectOption('Ocupacao[id_classe]', 'Primeira');
        $I->click('Save');
    }
}
