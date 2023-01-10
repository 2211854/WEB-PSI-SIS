<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\fixtures\CompanhiaFixture;
use common\models\Aviao;
use common\models\User;

class AviaoCest
{
    public function _fixtures()
    {
        return [
            'companhia' => [
                'class' => CompanhiaFixture::class,
                'dataFile' => codecept_data_dir() . 'companhia.php'
            ],
        ];
    }
    public function _before(FunctionalTester $I)
    {
        //  Check the content of fixtures in db
        $I->seeRecord(User::className(), ['username'=>'GPteste2']);
        $gestorPistas = User::findByUsername('GPteste2');
        $I->amLoggedInAs($gestorPistas);
    }

    public function criarAviao(FunctionalTester $I)
    {
        $I->amOnPage('aviao');

        $I->click('Criar Avião');
        $I->fillField('Aviao[marca]', 'Airbus');
        $I->fillField('Aviao[modelo]', 'A380');
        $I->fillField('Aviao[combustivelmaximo]', 100000);
        $I->fillField('Aviao[combustivelatual]', 10000);
        $I->selectOption('Aviao[estado]', 'operacional');
        $I->selectOption('Aviao[id_companhia]', '1');

        $I->click('Save');
        $I->seeRecord(Aviao::className(), ['modelo'=>'A380']);
    }


    public function editarAviao(FunctionalTester $I)
    {
        $I->amOnPage('aviao');
        $I->click('Criar Avião');
        $I->fillField('Aviao[marca]', 'Airbus2');
        $I->fillField('Aviao[modelo]', 'A3802');
        $I->fillField('Aviao[combustivelmaximo]', 100000);
        $I->fillField('Aviao[combustivelatual]', 10000);
        $I->selectOption('Aviao[estado]', 'operacional');
        $I->selectOption('Aviao[id_companhia]', '1');
        $I->click('Save');

        $I->see('Airbus2');
        $I->click('Update');
        $I->fillField('Aviao[modelo]', 'A3802Update');
        $I->selectOption('Aviao[id_companhia]', '2');
        $I->click('Save');
        $I->seeRecord(Aviao::className(), ['modelo'=>'A3802Update', 'id_companhia' => '2']);
    }


    public function apagarAviao(FunctionalTester $I)
    {

        $I->amOnPage('aviao');
        $I->click('Criar Avião');
        $I->fillField('Aviao[marca]', 'Airbus3');
        $I->fillField('Aviao[modelo]', 'A3803');
        $I->fillField('Aviao[combustivelmaximo]', 100000);
        $I->fillField('Aviao[combustivelatual]', 10000);
        $I->selectOption('Aviao[estado]', 'operacional');
        $I->selectOption('Aviao[id_companhia]', '1');
        $I->click('Save');

        $I->click('Delete');
        //$I->dontSeeRecord(Aviao::className(), ['marca'=>'Airbus3', 'modelo' => 'A3803']);
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }
}
