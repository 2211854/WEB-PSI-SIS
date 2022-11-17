<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //permissions
        // add "createOpearacao" permission
        $createOpearacao = $auth->createPermission('createOpearacao');
        $createOpearacao->description = 'Cria uma operação';
        $auth->add($createOpearacao);
        // add "updateOperacao" permission
        $updateOperacao = $auth->createPermission('updateOperacao');
        $updateOperacao->description = 'Atualiza uma operação';
        $auth->add($updateOperacao);


        // add "createRecurso" permission
        $createRecurso = $auth->createPermission('createRecurso');
        $createRecurso->description = 'Cria um recurso';
        $auth->add($createRecurso);
        // add "updateRecurso" permission
        $updateRecurso = $auth->createPermission('updateRecurso');
        $updateRecurso->description = 'Atualiza um recurso';
        $auth->add($updateRecurso);

        // add "createCategoriaProduto" permission
        $createCategoriaProduto = $auth->createPermission('createCategoriaProduto');
        $createCategoriaProduto->description = 'Cria uma categoria de produtos';
        $auth->add($createCategoriaProduto);
        // add "updateCategoriaProduto" permission
        $updateCategoriaProduto = $auth->createPermission('updateCategoriaProduto');
        $updateCategoriaProduto->description = 'Atualiza uma categoria de produtos';
        $auth->add($updateCategoriaProduto);
        // add "deleteCategoriaProduto" permission
        $deleteCategoriaProduto = $auth->createPermission('deleteCategoriaProduto');
        $deleteCategoriaProduto->description = 'Elimina uma categoria de produtos';
        $auth->add($deleteCategoriaProduto);

        // add "createUnidadesMedida" permission
        $createUnidadesMedida = $auth->createPermission('createUnidadesMedida');
        $createUnidadesMedida->description = 'Cria uma unidade de medida';
        $auth->add($createUnidadesMedida);
        // add "updateUnidadesMedida" permission
        $updateUnidadesMedida = $auth->createPermission('updateUnidadesMedida');
        $updateUnidadesMedida->description = 'Atualiza uma unidade de medida';
        $auth->add($updateUnidadesMedida);
        // add "deleteUnidadesMedida" permission
        $deleteUnidadesMedida = $auth->createPermission('deleteUnidadesMedida');
        $deleteUnidadesMedida->description = 'Elimina uma unidade de medida';
        $auth->add($deleteUnidadesMedida);

        // add "createPedidoRecurso" permission
        $createPedidoRecurso = $auth->createPermission('createPedidoRecurso');
        $createPedidoRecurso->description = 'Cria um pedido de recurso';
        $auth->add($createPedidoRecurso);

        // add "createHangares" permission
        $createHangares = $auth->createPermission('createHangares');
        $createHangares->description = 'Cria um hangar';
        $auth->add($createHangares);
        // add "updateHangares" permission
        $updateHangares = $auth->createPermission('updateHangares');
        $updateHangares->description = 'Atualiza um hangar';
        $auth->add($updateHangares);
        // add "deleteHangares" permission
        $deleteHangares = $auth->createPermission('deleteHangares');
        $deleteHangares->description = 'Elimina um hangar';
        $auth->add($deleteHangares);

        // add "updatePedidoRecurso" permission
        $updatePedidoRecurso = $auth->createPermission('updatePedidoRecurso');
        $updatePedidoRecurso->description = 'Atualiza um pedido de recurso';
        $auth->add($updatePedidoRecurso);

        // add "updateDetalhesVoo" permission
        $updateDetalhesVoo = $auth->createPermission('updateDetalhesVoo');
        $updateDetalhesVoo->description = 'Cria detalhes de voo';
        $auth->add($updateDetalhesVoo);

        // add "createPrecos" permission
        $createPrecos = $auth->createPermission('createPrecos');
        $createPrecos->description = 'Cria um preco para um determinado voo';
        $auth->add($createHangares);
        // add "updatePrecos" permission
        $updatePrecos = $auth->createPermission('updatePrecos');
        $updatePrecos ->description = 'Atualiza um preco para um determinado voo';
        $auth->add($updatePrecos);

        //roles
        // add "gestorPistas" role and give this role the "createPost" permission
        $gestorPistas = $auth->createRole('gestorPistas');
        $auth->add($gestorPistas);
        //$auth->addChild($gestorPistas, $createPost);

        // add "gestorLogistica" role and give this role the "createPost" permission
        $gestorLogistica = $auth->createRole('gestorLogistica');
        $auth->add($gestorLogistica);
        //$auth->addChild($gestorLogistica, $createPost);

        // add "gestorFinaceiro" role and give this role the "createPost" permission
        $gestorFinaceiro = $auth->createRole('gestorFinaceiro');
        $auth->add($gestorFinaceiro);
        //$auth->addChild($gestorFinaceiro, $createPost);

        // add "funcionarioManutencao" role and give this role the "createPost" permission
        $funcionarioManutencao = $auth->createRole('funcionarioManutencao');
        $auth->add($funcionarioManutencao);
        //$auth->addChild($funcionarioManutencao, $createPost);

        // add "cliente" role and give this role the "createPost" permission
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        //$auth->addChild(cliente, $createPost);

        // add "role1" role and give this role the "createPost" permission
        //$role1 = $auth->createRole('role1');
        //$auth->add($role1);
        //$auth->addChild($role1, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        //$auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $gestorPistas);
        $auth->addChild($admin, $gestorLogistica);
        $auth->addChild($admin, $gestorFinaceiro);
        $auth->addChild($admin, $funcionarioManutencao);


        //Assingn roles
        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }
}