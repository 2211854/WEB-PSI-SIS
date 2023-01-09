<?php


namespace frontend\tests\Unit\models;

use common\fixtures\VooFixtures;
use common\fixtures\VendaFixture;
use common\fixtures\ClasseFixture;
use frontend\tests\UnitTester;
use common\models\ItemVenda;

class ItemVendaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return[
            'venda' => [
                'class' => VendaFixture::class,
                'dataFile' => codecept_data_dir() . 'venda.php'
            ],
            'classe' => [
                'class' => ClasseFixture::class,
                'dataFile' => codecept_data_dir() . 'classe.php'
            ],
            'voo' => [
                'class' => VooFixtures::class,
                'dataFile' => codecept_data_dir() . 'voo.php'
            ],
        ];
    }

    protected function _before()
    {
    }
    // tests
    public function testCreateItemVenda()
    {
        $venda = $this->tester->grabFixture('venda', 'venda1');
        $classe = $this->tester->grabFixture('classe','classe1');
        $voo = $this->tester->grabFixture('voo','voo1');
        $itemvenda = new ItemVenda();
        $itemvenda->passaporte = 'CS1312441';
        $itemvenda->id_venda = $venda->id;
        $itemvenda->id_classe = $classe->id;
        $itemvenda->id_voo = $voo->id;

        verify( $itemvenda->save())->true();

        $this->assertEquals('CS1312441',$itemvenda->passaporte);
        verify($itemvenda->passaporte)->equals('CS1312441');
    }

    public function testAlterItemVenda()
    {
        $venda = $this->tester->grabFixture('venda', 'venda1');
        $classe = $this->tester->grabFixture('classe','classe1');
        $voo = $this->tester->grabFixture('voo','voo1');
        $itemvenda = new ItemVenda();
        $itemvenda->id = 1;
        $itemvenda->passaporte = 'CS1312441';
        $itemvenda->id_venda = $venda->id;
        $itemvenda->id_classe = $classe->id;
        $itemvenda->id_voo = $voo->id;

        verify( $itemvenda->save())->true();

        $model = ItemVenda::findOne(['id_voo'=>$itemvenda->id_voo,'passaporte'=>$itemvenda->passaporte]);
        $model->passaporte = 'CS12345678';


        verify($model->save())->true();

        $this->assertEquals('CS12345678', $model->passaporte);
    }

    public function testDeleteItemVenda()
    {
        $venda = $this->tester->grabFixture('venda', 'venda1');
        $classe = $this->tester->grabFixture('classe','classe1');
        $voo = $this->tester->grabFixture('voo','voo1');
        $itemvenda = new ItemVenda();
        $itemvenda->passaporte = 'CS1312441';
        $itemvenda->id_venda = $venda->id;
        $itemvenda->id_classe = $classe->id;
        $itemvenda->id_voo = $voo->id;

        verify( $itemvenda->save())->true();

        $model = ItemVenda::findOne(['id_voo'=>$itemvenda->id_voo,'passaporte'=>$itemvenda->passaporte]);
        verify($model->delete());
    }
}
