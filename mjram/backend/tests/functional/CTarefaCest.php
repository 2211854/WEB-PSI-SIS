<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class CTarefaCest
{
    public function _before(FunctionalTester $I)
    {
        $admin = \common\models\User::findByUsername('administrador');
        $I->amLoggedInAs($admin);
    }

    // tests
    public function CreateTarefa(FunctionalTester $I)
    {
        $I->amOnRoute('/tarefa/create?vooid=1');
        $I->amGoingTo('Tentar colocar tudo');
        $I->fillField('Tarefa[designacao]', 'Limpeza aviao');
        $I->selectOption('Tarefa[id_hangar]', 'Norte 1');
        $I->selectOption('Tarefa[id_recurso]', 'JET A');
        $I->fillField('Tarefa[quantidade]', '1');
        $I->click('Save');
    }
}
