<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\fixtures\CategoriaRecursoFixture;
use common\fixtures\UnidadeFixture;
use common\models\Recurso;

class RecursoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function _fixtures()
    {
        return [
            'categoria' => [
                'class' => CategoriaRecursoFixture::class,
                'dataFile' => codecept_data_dir() . 'categoriarecurso.php'
            ],
            'unidade' => [
                'class' => UnidadeFixture::class,
                'dataFile' => codecept_data_dir() . 'unidade.php'
            ]
        ];
    }

    protected function _before()
    {
    }

    // tests
    public function testCreateFailRecurso()
    {
        $categoria = $this->tester->grabFixture('categoria', 'categoria1');
        $unidade = $this->tester->grabFixture('unidade','unidade1');
        $recurso = new Recurso();
        $recurso->nome = 'nomeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $this->assertFalse($recurso->validate(['nome']));
        $recurso->stockatual = 'gsagas';
        $this->assertFalse($recurso->validate(['stockatual']));
        $recurso->id_categoria = 'asffas';
        $this->assertFalse($recurso->validate(['id_categoria']));
        $recurso->id_unidade = 'gasg';
        $this->assertFalse($recurso->validate(['id_unidade']));
        verify($recurso->save())->false();
    }
    public function testCreateRecurso()
    {
        $categoria = $this->tester->grabFixture('categoria', 'categoria1');
        $unidade = $this->tester->grabFixture('unidade','unidade1');
        $recurso = new Recurso();
        $recurso->nome = 'nome';
        $this->assertTrue($recurso->validate(['nome']));
        $recurso->stockatual = 60000;
        $this->assertTrue($recurso->validate(['stockatual']));
        $recurso->id_categoria = $categoria->id;
        $this->assertTrue($recurso->validate(['id_categoria']));
        $recurso->id_unidade = $unidade->id;
        $this->assertTrue($recurso->validate(['id_unidade']));
        verify($recurso->save())->true();
        $this->assertNotNull(Recurso::findOne(['id' => $recurso->id]));
    }
    public function testUpdateRecurso()
    {
        $categoria = $this->tester->grabFixture('categoria', 'categoria1');
        $unidade = $this->tester->grabFixture('unidade','unidade1');
        $recurso = new Recurso();
        $recurso->nome = 'nome';
        $recurso->stockatual = 60000;
        $recurso->id_categoria = $categoria->id;
        $recurso->id_unidade = $unidade->id;
        verify($recurso->save())->true();
        $unidade2 = $this->tester->grabFixture('unidade','unidade1');

        $recurso = Recurso::findOne(['id' => $recurso->id]);
        $recurso->stockatual = 500;
        $recurso->id_unidade = $unidade2->id;
        verify($recurso->save())->true();

        $this->assertEquals(500, $recurso->stockatual);
        $this->assertEquals($unidade2->id, $recurso->id_unidade);
    }

    public function testDeleteRecurso()
    {
        $categoria = $this->tester->grabFixture('categoria', 'categoria1');
        $unidade = $this->tester->grabFixture('unidade','unidade1');
        $recurso = new Recurso();
        $recurso->nome = 'nome';
        $recurso->stockatual = 60000;
        $recurso->id_categoria = $categoria->id;
        $recurso->id_unidade = $unidade->id;
        verify($recurso->save())->true();

        $recurso = Recurso::findOne(['id' => $recurso->id]);
        $recurso->delete();

        $deletedRecurso = Recurso::findOne(['id' => $recurso->id]);
        $this->assertNull($deletedRecurso);
    }
}
