<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\fixtures\CompanhiaFixture;
use common\models\Aviao;

class AviaoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return [
            'companhia' => [
                'class' => CompanhiaFixture::class,
                'dataFile' => codecept_data_dir() . 'companhia.php'
            ],
        ];
    }

    protected function _before()
    {
    }

    public function testCreateAviaoUnsuccessfully()
    {

        $model = new Aviao();
        $model->designacao = 'nomeloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong';
        $this->assertFalse($model->validate(['designacao']));
        $model->marca = 'marcaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($model->validate(['marca']));
        $model->modelo = 'modelooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($model->validate(['modelo']));
        $model->combustivelatual = 'teste';
        $this->assertFalse($model->validate(['combustivelatual']));
        $model->combustivelmaximo = 'teste';
        $this->assertFalse($model->validate(['combustivelmaximo']));
        $model->id_companhia = 'teste';
        $this->assertFalse($model->validate(['id_companhia']));
        verify($model->save())->false();

    }


    public function testCreateAviaoSuccessfully()
    {
        $companhia = $this->tester->grabFixture('companhia', 'companhia1');
        $model = new Aviao();
        $model->designacao = 'VooTeste1';
        $this->assertTrue($model->validate(['designacao']));
        $model->marca = 'AirBus';
        $this->assertTrue($model->validate(['marca']));
        $model->modelo = 'A380';
        $this->assertTrue($model->validate(['modelo']));
        $model->combustivelatual = 100000;
        $this->assertTrue($model->validate(['combustivelatual']));
        $model->combustivelmaximo = 10000;
        $this->assertTrue($model->validate(['combustivelmaximo']));
        $model->estado = 'operacional';
        $this->assertTrue($model->validate(['estado']));
        $model->id_companhia = $companhia->id;
        $this->assertTrue($model->validate(['id_companhia']));
        verify($model->save())->true();
        $this->assertNotNull( Aviao::findOne(['id' =>  $model->id]));
    }

    public function testUpdateAviao()
    {
        $companhia = $this->tester->grabFixture('companhia', 'companhia1');
        $model = new Aviao();
        $model->designacao = 'VooTeste1';
        $model->marca = 'AirBus';
        $model->modelo = 'A380';
        $model->combustivelatual = 100000;
        $model->combustivelmaximo = 10000;
        $model->estado = 'operacional';
        $model->id_companhia = $companhia->id;
        $model->save();

        $companhia2 = $this->tester->grabFixture('companhia', 'companhia2');
        $aviao = Aviao::findOne(['id' =>  $model->id]);

        $aviao->designacao = 'VooTeste1Update';
        $aviao->modelo = 'A380Update';
        $aviao->id_companhia = $companhia2->id;
        $aviao->save();

        $this->assertEquals('VooTeste1Update', $aviao->designacao);
        $this->assertEquals('A380Update', $aviao->modelo);
        $this->assertEquals($companhia2->id, $aviao->id_companhia);
    }

    public function testDeleteAviao()
    {
        $companhia = $this->tester->grabFixture('companhia', 'companhia1');
        $model = new Aviao();
        $model->designacao = 'VooTeste1';
        $model->marca = 'AirBus';
        $model->modelo = 'A380';
        $model->combustivelatual = 100000;
        $model->combustivelmaximo = 10000;
        $model->estado = 'operacional';
        $model->id_companhia = $companhia->id;
        $model->save();

        $aviao = Aviao::findOne(['id' =>  $model->id]);
        $aviao->delete();

        $deletedaviao = Aviao::findOne(['id' =>  $model->id]);
        $this->assertNull($deletedaviao);
    }


    // tests
    public function testSomeFeature()
    {

    }
}
