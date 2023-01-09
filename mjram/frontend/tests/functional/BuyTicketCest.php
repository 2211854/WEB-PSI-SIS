<?php


namespace frontend\tests\Functional;

use frontend\tests\FunctionalTester;

class BuyTicketCest
{
    public function _before(FunctionalTester $I)
    {
        $admin = \common\models\User::findByUsername('ricardo');
        $I->amLoggedInAs($admin);
    }

    // tests
    public function PesquisarTicket(FunctionalTester $I)
    {
        $I->amOnRoute('/site/index');
        $I->fillField('partida', 'Faro');
        $I->fillField('destino', 'Madrid');
        $I->fillField('data', '2023-01-19');
        $I->click('Procurar');
    }
    public function detalhesTicket(FunctionalTester $I)
    {
        $I->amOnRoute('/voo/index?id=searchVooForm&partida=Faro&destino=Madrid&data=2023-01-19');
        $I->click('Detalhes');
    }
    public function AddTicket(FunctionalTester $I)
    {
        $I->amOnRoute('/web/voo/view?id=8');
        $I->fillField('passporte', 'cs12345678');
        $I->click('Adicionar ao carrinho');
    }
    public function buyTicket(FunctionalTester $I)
    {
        $I->amOnRoute('/web/itemvenda/index?id=1');
        $I->click('Efetuar pagamento');
    }
}
