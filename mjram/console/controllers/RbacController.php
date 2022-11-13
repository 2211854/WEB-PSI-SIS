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
        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);
        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

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