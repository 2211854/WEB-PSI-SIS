<?php


namespace frontend\tests\Unit\models;

use common\fixtures\ClienteFixtures;
use common\fixtures\UserFixture;
use common\fixtures\UtilizadorFixtures;
use common\models\Venda;
use frontend\tests\UnitTester;

class VendaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return[
            'cliente' => [
                'class' => ClienteFixtures::class,
                'dataFile' => codecept_data_dir() . 'cliente.php'
            ],
        ];
    }
    protected function _before()
    {
    }

    // tests
    public function testCreateVenda()
    {
        $cliente = $this->tester->grabFixture('cliente', 'cliente1');
        $venda = new Venda();
        $venda->estado = 'pago';
        $this->assertTrue($venda->validate(['estado']));
        $venda->data_compra = '2022-12-08 13:34:46';
        $this->assertTrue($venda->validate(['data_compra']));
        $venda->data_registo= '2022-12-09 13:34:46';
        $this->assertTrue($venda->validate(['data_registo']));
        $venda->id_cliente = $cliente->id;
        $this->assertTrue($venda->validate(['id_cliente']));

        verify($venda->save())->true();

        $this->assertEquals('pago',$venda->estado );
        verify($venda->estado)->equals('pago');
    }

    public function testUpdateVenda()
    {
        $vendas = new Venda();
        $vendas->estado = 'pago';
        $vendas->data_compra = '2022-12-09 13:34:46';
        $vendas->data_registo= '2022-12-08 13:34:46';
        $vendas->id_cliente = 1;

        verify($vendas->save())->true();

        $model = Venda::findOne($vendas->id);
        $model->estado = 'cancelado';


        verify($model->save())->true();

        $this->assertEquals('cancelado', $model->estado);
    }
    public function testDeleteVenda()
    {
        $vendas = new Venda();
        $vendas->estado = 'pago';
        $vendas->data_compra = '2022-12-08 13:34:46';
        $vendas->data_registo= '2022-12-09 13:34:46';
        $vendas->id_cliente = 1;

        verify( $vendas->save())->true();

        $model = Venda::findOne($vendas->id);
        verify($model->delete());
    }
}
