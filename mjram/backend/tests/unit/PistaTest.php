<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\hangar;

class PistaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {

    }

    // tests
    public function testCreateHangar()
    {
        $hangar = new Hangar();
        $hangar->designacao = 'Norte 2';

        verify($hangar->save())->true();

        $this->assertEquals('Norte 2',$hangar->designacao);
        verify($hangar->designacao)->equals('Norte 2');
    }

    public  function  testAlterHangar()
    {
        $hangar = new Hangar();
        $hangar->designacao = 'Norte 2';

        verify( $hangar->save())->true();

        $model = Hangar::findOne($hangar->id);

        $model->designacao = 'Norte 4';

        $this->assertEquals('Norte 4', $model->designacao);

    }

    public  function  testDeleteHangar()
    {
        $hangar = new Hangar();
        $hangar->designacao = 'Norte 2';
        verify( $hangar->save())->true();

        $model = Hangar::findOne($hangar->id);
        verify($model->delete());
    }
}
