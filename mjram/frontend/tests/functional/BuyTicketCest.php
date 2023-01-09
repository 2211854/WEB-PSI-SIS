<?php


namespace frontend\tests\Functional;

use frontend\tests\FunctionalTester;

class BuyTicketCest
{
    public function _before(FunctionalTester $I)
    {
        $admin = \common\models\User::findByUsername('clienteFernando');
        $I->amLoggedInAs($admin);
    }

    // tests
    public function PesquisarTicket(FunctionalTester $I)
    {
        $I->amOnRoute('/site/index');
        $I->fillField('partida', 'lisboa');
        $I->fillField('destino', 'Luton');
        $I->fillField('data', '2023-01-24');
        $I->click('Procurar');
    }
    public function AddTicket(FunctionalTester $I)
    {
        //fazer
        $I->amOnRoute('/site/index');
        $I->fillField('partida', 'lisboa');
        $I->fillField('destino', 'Luton');
        $I->fillField('data', '2023-01-24');
        $I->click('Procurar');
    }
}
