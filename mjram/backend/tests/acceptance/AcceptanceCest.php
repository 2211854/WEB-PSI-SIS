<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class AcceptanceCest
{
    public function _before(AcceptanceTester $I)
    {
//        $admin = \common\models\User::findByUsername('admnistrador');
//        $I->amLoggedInAs($admin);
    }

    // tests
    public function login(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->amGoingTo('try to login with correct credentials');
        verify($I->submitForm('#login-form', [
            'LoginForm[username]' => 'administrador',
            'LoginForm[password]' => '12345678'
        ]));
        $I->wait(3);

    }
    public function criarCompanhia(AcceptanceTester $I){
        $I->amOnPage('/companhia/create');
        $I->amGoingTo('try to create a companhia');
        verify($I->submitForm('#login-form', [
            'Companhia[nome]' => 'American Airlines',
            'Companhia[sigla]' => 'AA'
        ]));
        $I->wait(2);
    }
//    public function criarHangar(AcceptanceTester $I){
//        $I->amOnPage('/hangar/create');
//        $I->amGoingTo('try to create a hangar');
//        $I->fillField('Hangar[designacao]', 'hangar 4');
//        $I->wait(2);
//        $I->click('Save');
//    }
//    public function criarPista(AcceptanceTester $I){
//        $I->amOnPage('/pista/create');
//        $I->amGoingTo('try to create a pista');
//        $I->fillField('Pista[designacao]', '17/36');
//        $I->fillField('Pista[comprimento]', '4000');
//        $I->fillField('Pista[largura]', '50');
//        $I->selectOption('Pista[estado]', 'Operacional');
//        $I->wait(3);
//        $I->click('Save');
//    }
//    public function criarAviao(AcceptanceTester $I){
//        $I->amOnPage('/aviao/create');
//        $I->amGoingTo('try to create a aviao');
//        $I->fillField('Aviao[marca]', 'Airbus');
//        $I->fillField('Aviao[modelo]', 'A380');
//        $I->fillField('Aviao[combustivelmaximo]', '500000');
//        $I->fillField('Aviao[combustivelatual]', '380000');
//        $I->selectOption('Aviao[estado]', 'Operacional');
//        $I->selectOption('Aviao[id_companhia]', 'Qatar Airways');
//        $I->wait(3);
//        $I->click('Save');
//    }
//    public function criarOcupacao(AcceptanceTester $I){
//        $I->amOnPage('/ocupacao/create?aviaoid=1');
//        $I->amGoingTo('try to create a ocupacao');
//        $I->fillField('Ocupacao[ocupacao]', '240');
//        $I->selectOption('Ocupacao[id_classe]', 'Primeira');
//        $I->wait(2);
//        $I->click('Save');
//    }
//    public function criarVoo(AcceptanceTester $I){
//        $I->amOnPage('/voo/create');
//        $I->amGoingTo('try to create a ocupacao');
//        $I->fillField('Voo[designacao]', 'VooTeste3');
//        $I->selectOption('Voo[id_aviao]', 'TAP1');
//        $I->selectOption('Voo[id_pista]', '17/35');
//        $I->wait(3);
//        $I->click('Save');
//    }
//    public function criarDetalheVoo(AcceptanceTester $I){
//        $I->amOnPage('/detalhevoo/create?vooid=1');
//        $I->amGoingTo('try to create a Detalhe voo');
//        $I->fillField('DetalheVoo[preço]', '350');
//        $I->selectOption('DetalheVoo[id_classe]', 'Economica');
//        $I->wait(3);
//        $I->click('Save');
//    }
//    public function criarEscalaVoo(AcceptanceTester $I){
//        $I->amOnPage('/escalavoo/create?vooid=1');
//        $I->amGoingTo('try to create a Escala voo');
//        $I->fillField('EscalaVoo[destino]', 'Madrid');
//        $I->fillField('EscalaVoo[horario_partida]', '2023-01-09 02:54:22');
//        $I->fillField('EscalaVoo[horario_chegada]', '2023-01-13 02:54:22');
//        $I->wait(3);
//        $I->click('Save');
//    }


}
