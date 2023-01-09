<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use Codeception\Exception\ModuleException;
use common\fixtures\FuncionarioFixture;
use common\fixtures\PistaFixture;
use common\fixtures\AviaoFixture;
use common\models\Voo;

class VooTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return[
            'funcionario' => [
                'class' => FuncionarioFixture::class,
                'dataFile' => codecept_data_dir() . 'funcionario.php'
            ],
            'pista' => [
                'class' => PistaFixture::class,
                'dataFile' => codecept_data_dir() . 'pista.php'
            ],
            'aviao' => [
                'class' => AviaoFixture::class,
                'dataFile' => codecept_data_dir() . 'aviao.php'
            ],
        ];
    }

    protected function _before()
    {
    }

    // tests

    /**
     * @throws ModuleException
     */
    public function testCreateFly()
    {
        $funcionario = $this->tester->grabFixture('funcionario', 'funcionario1');
        $pista = $this->tester->grabFixture('pista','pista1');
        $aviao = $this->tester->grabFixture('aviao','aviao1');
        $voo = new Voo();
        $voo->designacao = 'Voo Teste3';
        $voo->data_registo = '2023-01-08 20:12:40';
        $voo->id_aviao = $aviao->id;
        $voo->id_funcionario = $funcionario->id;
        $voo->id_pista = $pista->id;

        verify( $voo->save())->true();

        $this->assertEquals('Voo Teste3',$voo->designacao);
        verify($voo->designacao)->equals('Voo Teste3');
    }
    public function testUpdateFly()
    {
        $funcionario = $this->tester->grabFixture('funcionario', 'funcionario1');
        $pista = $this->tester->grabFixture('pista','pista1');
        $aviao = $this->tester->grabFixture('aviao','aviao1');
        $voo = new Voo();
        $voo->designacao = 'Voo Teste3';
        $voo->data_registo = '2023-01-08 20:12:40';
        $voo->id_aviao = $aviao->id;
        $voo->id_funcionario = $funcionario->id;
        $voo->id_pista = $pista->id;

        verify( $voo->save())->true();

        $model = Voo::findOne($voo->id);

        $model->designacao = 'Voo Teste4';

        $this->assertEquals('Voo Teste4', $model->designacao);
    }

    public function testDeleteFly()
    {
        $funcionario = $this->tester->grabFixture('funcionario', 'funcionario1');
        $pista = $this->tester->grabFixture('pista','pista1');
        $aviao = $this->tester->grabFixture('aviao','aviao1');
        $voo = new Voo();
        $voo->designacao = 'Voo Teste3';
        $voo->data_registo = '2023-01-08 20:12:40';
        $voo->id_aviao = $aviao->id;
        $voo->id_funcionario = $funcionario->id;
        $voo->id_pista = $pista->id;

        verify( $voo->save())->true();

        $model = Voo::findOne($voo->id);
        verify($model->delete());
    }
}
