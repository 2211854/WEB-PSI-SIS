<?php


namespace frontend\tests\Unit\models;

use common\fixtures\UserFixture;
use common\models\Cliente;
use common\models\User;
use common\models\Utilizador;
use frontend\tests\UnitTester;

class InserirClienteTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }
    public function _fixtures()
    {
        return[
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ];
    }
    public function testCreateInserirClienteUnsuccessfully()
    {

        $modelUtilizador = new Utilizador();
        $modelUtilizador->nome = 'nomeooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($modelUtilizador->validate(['nome']));
        $modelUtilizador->apelidos = 'apelidooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($modelUtilizador->validate(['apelidos']));
        $modelUtilizador->nif = 12345678901234567 ;
        $this->assertFalse($modelUtilizador->validate(['nif']));
        $modelUtilizador->id_user = 'teste' ;
        $this->assertFalse($modelUtilizador->validate(['id_user']));
        $modelUtilizador->username = 'e';
        $this->assertFalse($modelUtilizador->validate(['username']));
        $modelUtilizador->email = 'e';
        $this->assertFalse($modelUtilizador->validate(['email']));
        $modelUtilizador->password = 'e';
        $this->assertFalse($modelUtilizador->validate(['password']));
        $modelUtilizador->telemovel = 'e';
        $this->assertFalse($modelUtilizador->validate(['telemovel']));
        $modelUtilizador->cartaocidadao = 'e';
        $this->assertFalse($modelUtilizador->validate(['cartaocidadao']));

        verify($modelUtilizador->save())->false();
        $modelCliente = new Cliente();
        $modelCliente->id = 'qwertyuioplkjhfg' ;
        $this->assertFalse($modelCliente->validate(['id']));
        $modelCliente->passaporte = 'qwertyuioplkjhfg' ;
        $this->assertFalse($modelCliente->validate(['passaporte']));
        verify($modelCliente->save())->false();


    }


    public function testCreateInserirClienteSuccessfully()
    {
        $user = $this->tester->grabFixture('user', 'cliente2');
        $modelUtilizador = new Utilizador();
        $modelUtilizador->nome = 'ClienteNome';
        $this->assertTrue($modelUtilizador->validate(['nome']));
        $modelUtilizador->apelidos = 'ApelidoNome';
        $this->assertTrue($modelUtilizador->validate(['apelidos']));
        $modelUtilizador->nif = '123456789';
        $this->assertTrue($modelUtilizador->validate(['nif']));
        $modelUtilizador->id_user =  $user->id;
        $this->assertTrue($modelUtilizador->validate(['id_user']));
        $modelUtilizador->username = 'cliente2Username';
        $this->assertTrue($modelUtilizador->validate(['username']));
        $modelUtilizador->email = 'cliente2@cliente2.pt';
        $this->assertTrue($modelUtilizador->validate(['email']));
        $modelUtilizador->password = '12345678';
        $this->assertTrue($modelUtilizador->validate(['password']));
        $modelUtilizador->telemovel = 123456789;
        $this->assertTrue($modelUtilizador->validate(['telemovel']));
        $modelUtilizador->cartaocidadao = 1234567890;
        $this->assertTrue($modelUtilizador->validate(['cartaocidadao']));
        verify($modelUtilizador->save(false))->true();
        $this->assertNotNull( Utilizador::findOne(['id' =>  $modelUtilizador->id]));

        $modelCliente = new Cliente();
        $modelCliente->id = $modelUtilizador->id ;
        $this->assertTrue($modelCliente->validate(['id']));
        $modelCliente->passaporte = 'qwertyuio' ;
        $this->assertTrue($modelCliente->validate(['passaporte']));
        verify($modelCliente->save())->true();
        $this->assertNotNull( Cliente::findOne(['id' =>  $modelCliente->id]));
    }



    public function testUpdateInserirCliente()
    {

        $user = $this->tester->grabFixture('user', 'cliente2');
        $modelUtilizador = new Utilizador();
        $modelUtilizador->nome = 'ClienteNome';
        $this->assertTrue($modelUtilizador->validate(['nome']));
        $modelUtilizador->apelidos = 'ApelidoNome';
        $this->assertTrue($modelUtilizador->validate(['apelidos']));
        $modelUtilizador->nif = '123456789';
        $this->assertTrue($modelUtilizador->validate(['nif']));
        $modelUtilizador->id_user =  $user->id;
        $this->assertTrue($modelUtilizador->validate(['id_user']));
        $modelUtilizador->username = 'cliente2Username';
        $this->assertTrue($modelUtilizador->validate(['username']));
        $modelUtilizador->email = 'cliente2@cliente2.pt';
        $this->assertTrue($modelUtilizador->validate(['email']));
        $modelUtilizador->password = '12345678';
        $this->assertTrue($modelUtilizador->validate(['password']));
        $modelUtilizador->telemovel = 123456789;
        $this->assertTrue($modelUtilizador->validate(['telemovel']));
        $modelUtilizador->cartaocidadao = 1234567890;
        $this->assertTrue($modelUtilizador->validate(['cartaocidadao']));
        verify($modelUtilizador->save(false))->true();
        $this->assertNotNull( Utilizador::findOne(['id' =>  $modelUtilizador->id]));

        $modelCliente = new Cliente();
        $modelCliente->id = $modelUtilizador->id ;
        $this->assertTrue($modelCliente->validate(['id']));
        $modelCliente->passaporte = 'qwertyuio' ;
        $this->assertTrue($modelCliente->validate(['passaporte']));
        verify($modelCliente->save())->true();
        $this->assertNotNull( Cliente::findOne(['id' =>  $modelCliente->id]));

        $modelUtilizador->apelidos = 'ApelidoNomeUpdate';
        $modelCliente->passaporte = 'qweUpdate';
        $modelUtilizador->save();
        $modelCliente->save();

        $this->assertEquals('ApelidoNomeUpdate', $modelUtilizador->apelidos);
        $this->assertEquals('qweUpdate', $modelCliente->passaporte);
    }

    public function testDeleteInserirCliente()
    {
        $user = $this->tester->grabFixture('user', 'cliente2');
        $modelUtilizador = new Utilizador();
        $modelUtilizador->nome = 'ClienteNome';
        $this->assertTrue($modelUtilizador->validate(['nome']));
        $modelUtilizador->apelidos = 'ApelidoNome';
        $this->assertTrue($modelUtilizador->validate(['apelidos']));
        $modelUtilizador->nif = '123456789';
        $this->assertTrue($modelUtilizador->validate(['nif']));
        $modelUtilizador->id_user =  $user->id;
        $this->assertTrue($modelUtilizador->validate(['id_user']));
        $modelUtilizador->username = 'cliente2Username';
        $this->assertTrue($modelUtilizador->validate(['username']));
        $modelUtilizador->email = 'cliente2@cliente2.pt';
        $this->assertTrue($modelUtilizador->validate(['email']));
        $modelUtilizador->password = '12345678';
        $this->assertTrue($modelUtilizador->validate(['password']));
        $modelUtilizador->telemovel = 123456789;
        $this->assertTrue($modelUtilizador->validate(['telemovel']));
        $modelUtilizador->cartaocidadao = 1234567890;
        $this->assertTrue($modelUtilizador->validate(['cartaocidadao']));
        verify($modelUtilizador->save(false))->true();

        $modelCliente = new Cliente();
        $modelCliente->id = $modelUtilizador->id ;
        $this->assertTrue($modelCliente->validate(['id']));
        $modelCliente->passaporte = 'qwertyuio' ;
        $this->assertTrue($modelCliente->validate(['passaporte']));
        verify($modelCliente->save())->true();

        $Cliente = Cliente::findOne(['id' => $modelCliente->id]);
        $Cliente->delete();

        $deletedCliente = Cliente::findOne(['id' =>  $modelCliente->id]);
        $this->assertNull($deletedCliente);

        $Utilizador = Utilizador::findOne(['id' => $modelUtilizador->id]);
        $Utilizador->delete();

        $deletedUtilizador = Utilizador::findOne(['id' =>  $modelUtilizador->id]);
        $this->assertNull($deletedUtilizador);
    }

    // tests
    public function testSomeFeature()
    {

    }
}
