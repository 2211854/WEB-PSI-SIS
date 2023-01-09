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
        // add "loginBO" permission
        $loginBO = $auth->createPermission('loginBO');
        $loginBO->description = 'Fazer login no backoffice';
        $auth->add($loginBO);
        // add "loginBO" permission
        $loginFO = $auth->createPermission('loginFO');
        $loginBO->description = 'Fazer login no frontoffice';
        $auth->add($loginFO);
        // add "siteIndexBo" permission
        $siteIndexBO = $auth->createPermission('siteIndexBO');
        $siteIndexBO->description = 'Ver o site index backoffice';
        $auth->add($siteIndexBO);
        // add "logoutBO" permission
        $logoutBO = $auth->createPermission('logoutBO');
        $logoutBO->description = 'Fazer o logout no backoffice';
        $auth->add($logoutBO);


        // add "createAviao" permission
        $createAviao = $auth->createPermission('createAviao');
        $createAviao->description = 'Criar um aviao';
        $auth->add($createAviao);
        // add "updateAviao" permission
        $updateAviao = $auth->createPermission('updateAviao');
        $updateAviao->description = 'Atualiza um Aviao';
        $auth->add($updateAviao);
        // add "indexAviao" permission
        $indexAviao = $auth->createPermission('indexAviao');
        $indexAviao->description = 'Ver a lista de avioes';
        $auth->add($indexAviao);
        // add "indexAviao" permission
        $viewAviao = $auth->createPermission('viewAviao');
        $viewAviao->description = 'Ver detalhes do aviao';
        $auth->add($viewAviao);
        // add "deleteAviao" permission
        $deleteAviao = $auth->createPermission('deleteAviao');
        $deleteAviao->description = 'Apagar um Aviao';
        $auth->add($deleteAviao);


        // add "createCategoriarecurso" permission
        $createCategoriarecurso = $auth->createPermission('createCategoriarecurso');
        $createCategoriarecurso->description = 'Criar uma Categoriarecurso';
        $auth->add($createCategoriarecurso);
        // add "updateCategoriarecurso" permission
        $updateCategoriarecurso = $auth->createPermission('updateCategoriarecurso');
        $updateCategoriarecurso->description = 'Atualiza uma Categoriarecurso';
        $auth->add($updateCategoriarecurso);
        // add "indexCategoriarecurso" permission
        $indexCategoriarecurso = $auth->createPermission('indexCategoriarecurso');
        $indexCategoriarecurso->description = 'Ver a lista de Categoriarecurso';
        $auth->add($indexCategoriarecurso);
        // add "indexCategoriarecurso" permission
        $viewCategoriarecurso = $auth->createPermission('viewCategoriarecurso');
        $viewCategoriarecurso->description = 'Ver os detalhes do Categoriarecurso';
        $auth->add($viewCategoriarecurso);
        // add "deleteCategoriarecurso" permission
        $deleteCategoriarecurso = $auth->createPermission('deleteCategoriarecurso');
        $deleteCategoriarecurso->description = 'Apagar um Categoriarecurso';
        $auth->add($deleteCategoriarecurso);


        // add "createClasse" permission
        $createClasse = $auth->createPermission('createClasse');
        $createClasse->description = 'Criar uma Classe';
        $auth->add($createClasse);
        // add "updateClasse" permission
        $updateClasse = $auth->createPermission('updateClasse');
        $updateClasse->description = 'Atualiza uma Classe';
        $auth->add($updateClasse);
        // add "indexClasse" permission
        $indexClasse = $auth->createPermission('indexClasse');
        $indexClasse->description = 'Ver a lista de Classes';
        $auth->add($indexClasse);
        // add "indexClasse" permission
        $viewClasse = $auth->createPermission('viewClasse');
        $viewClasse->description = 'Ver detalhes da Classe';
        $auth->add($viewClasse);
        // add "deleteClasse" permission
        $deleteClasse = $auth->createPermission('deleteClasse');
        $deleteClasse->description = 'Apagar uma Classe';
        $auth->add($deleteClasse);


        // add "createCompanhia" permission
        $createCompanhia = $auth->createPermission('createCompanhia');
        $createCompanhia->description = 'Criar uma Companhia';
        $auth->add($createCompanhia);
        // add "updateCompanhia" permission
        $updateCompanhia = $auth->createPermission('updateCompanhia');
        $updateCompanhia->description = 'Atualiza uma Companhia';
        $auth->add($updateCompanhia);
        // add "indexCompanhia" permission
        $indexCompanhia = $auth->createPermission('indexCompanhia');
        $indexCompanhia->description = 'Ver a lista de Companhias';
        $auth->add($indexCompanhia);
        // add "indexCompanhia" permission
        $viewCompanhia = $auth->createPermission('viewCompanhia');
        $viewCompanhia->description = 'Ver detalhes da Companhia';
        $auth->add($viewCompanhia);
        // add "deleteCompanhia" permission
        $deleteCompanhia = $auth->createPermission('deleteCompanhia');
        $deleteCompanhia->description = 'Apagar uma Companhia';
        $auth->add($deleteCompanhia);


        // add "createDetalhevoo" permission
        $createDetalhevoo = $auth->createPermission('createDetalhevoo');
        $createDetalhevoo->description = 'Criar um Detalhevoo';
        $auth->add($createDetalhevoo);
        // add "updateDetalhevoo" permission
        $updateDetalhevoo = $auth->createPermission('updateDetalhevoo');
        $updateDetalhevoo->description = 'Atualiza um Detalhevoo';
        $auth->add($updateDetalhevoo);
        // add "indexDetalhevoo" permission
        $indexDetalhevoo = $auth->createPermission('indexDetalhevoo');
        $indexDetalhevoo->description = 'Ver a lista de Detalhevoo';
        $auth->add($indexDetalhevoo);
        // add "indexDetalhevoo" permission
        $viewDetalhevoo = $auth->createPermission('viewDetalhevoo');
        $viewDetalhevoo->description = 'Ver detalhes do Detalhevoo';
        $auth->add($viewDetalhevoo);
        // add "deleteDetalhevoo" permission
        $deleteDetalhevoo = $auth->createPermission('deleteDetalhevoo');
        $deleteDetalhevoo->description = 'Apagar um Detalhevoo';
        $auth->add($deleteDetalhevoo);


        // add "createEscalavoo" permission
        $createEscalavoo = $auth->createPermission('createEscalavoo');
        $createEscalavoo->description = 'Criar um Escalavoo';
        $auth->add($createEscalavoo);
        // add "updateEscalavoo" permission
        $updateEscalavoo = $auth->createPermission('updateEscalavoo');
        $updateEscalavoo->description = 'Atualiza um Escalavoo';
        $auth->add($updateEscalavoo);
        // add "indexEscalavoo" permission
        $indexEscalavoo = $auth->createPermission('indexEscalavoo');
        $indexEscalavoo->description = 'Ver a lista de Escalavoo';
        $auth->add($indexEscalavoo);
        // add "indexEscalavoo" permission
        $viewEscalavoo = $auth->createPermission('viewEscalavoo');
        $viewEscalavoo->description = 'Ver detalhes do Escalavoo';
        $auth->add($viewEscalavoo);
        // add "deleteEscalavoo" permission
        $deleteEscalavoo = $auth->createPermission('deleteEscalavoo');
        $deleteEscalavoo->description = 'Apagar um Escalavoo';
        $auth->add($deleteEscalavoo);


        // add "createFuncionario" permission
        $createFuncionario = $auth->createPermission('createFuncionario');
        $createFuncionario->description = 'Criar um Funcionario';
        $auth->add($createFuncionario);
        // add "updateFuncionario" permission
        $updateFuncionario = $auth->createPermission('updateFuncionario');
        $updateFuncionario->description = 'Atualiza um Funcionario';
        $auth->add($updateFuncionario);
        // add "indexFuncionario" permission
        $indexFuncionario = $auth->createPermission('indexFuncionario');
        $indexFuncionario->description = 'Ver a lista de Funcionario';
        $auth->add($indexFuncionario);
        // add "indexFuncionario" permission
        $viewFuncionario = $auth->createPermission('viewFuncionario');
        $viewFuncionario->description = 'Ver detalhes do Funcionario';
        $auth->add($viewFuncionario);
        // add "deleteFuncionario" permission
        $deleteFuncionario = $auth->createPermission('deleteFuncionario');
        $deleteFuncionario->description = 'Apagar um Funcionario';
        $auth->add($deleteFuncionario);


        // add "createHangar" permission
        $createHangar = $auth->createPermission('createHangar');
        $createHangar->description = 'Criar um Hangar';
        $auth->add($createHangar);
        // add "updateHangar" permission
        $updateHangar = $auth->createPermission('updateHangar');
        $updateHangar->description = 'Atualiza um Hangar';
        $auth->add($updateHangar);
        // add "indexHangar" permission
        $indexHangar = $auth->createPermission('indexHangar');
        $indexHangar->description = 'Ver a lista de Hangar';
        $auth->add($indexHangar);
        // add "indexHangar" permission
        $viewHangar = $auth->createPermission('viewHangar');
        $viewHangar->description = 'Ver detalhes do Hangar';
        $auth->add($viewHangar);
        // add "deleteHangar" permission
        $deleteHangar = $auth->createPermission('deleteHangar');
        $deleteHangar->description = 'Apagar um Hangar';
        $auth->add($deleteHangar);


        // add "createOcupacao" permission
        $createOcupacao = $auth->createPermission('createOcupacao');
        $createOcupacao->description = 'Criar um Ocupacao';
        $auth->add($createOcupacao);
        // add "updateOcupacao" permission
        $updateOcupacao = $auth->createPermission('updateOcupacao');
        $updateOcupacao->description = 'Atualiza um Ocupacao';
        $auth->add($updateOcupacao);
        // add "indexOcupacao" permission
        $indexOcupacao = $auth->createPermission('indexOcupacao');
        $indexOcupacao->description = 'Ver a lista de Ocupacao';
        $auth->add($indexOcupacao);
        // add "indexOcupacao" permission
        $viewOcupacao = $auth->createPermission('viewOcupacao');
        $viewOcupacao->description = 'Ver detalhes do Ocupacao';
        $auth->add($viewOcupacao);
        // add "deleteOcupacao" permission
        $deleteOcupacao = $auth->createPermission('deleteOcupacao');
        $deleteOcupacao->description = 'Apagar um Ocupacao';
        $auth->add($deleteOcupacao);


        // add "createPedidorecurso" permission
        $createPedidorecurso = $auth->createPermission('createPedidorecurso');
        $createPedidorecurso->description = 'Criar um Pedidorecurso';
        $auth->add($createPedidorecurso);
        // add "updatePedidorecurso" permission
        $updatePedidorecurso = $auth->createPermission('updatePedidorecurso');
        $updatePedidorecurso->description = 'Atualiza um Pedidorecurso';
        $auth->add($updatePedidorecurso);
        // add "indexPedidorecurso" permission
        $indexPedidorecurso = $auth->createPermission('indexPedidorecurso');
        $indexPedidorecurso->description = 'Ver a lista de Pedidorecurso';
        $auth->add($indexPedidorecurso);
        // add "indexPedidorecurso" permission
        $viewPedidorecurso = $auth->createPermission('viewPedidorecurso');
        $viewPedidorecurso->description = 'Ver detalhes do Pedidorecurso';
        $auth->add($viewPedidorecurso);
        // add "deletePedidorecurso" permission
        $deletePedidorecurso = $auth->createPermission('deletePedidorecurso');
        $deletePedidorecurso->description = 'Apagar um Pedidorecurso';
        $auth->add($deletePedidorecurso);


        // add "createPista" permission
        $createPista = $auth->createPermission('createPista');
        $createPista->description = 'Criar um Pista';
        $auth->add($createPista);
        // add "updatePista" permission
        $updatePista = $auth->createPermission('updatePista');
        $updatePista->description = 'Atualiza um Pista';
        $auth->add($updatePista);
        // add "indexPista" permission
        $indexPista = $auth->createPermission('indexPista');
        $indexPista->description = 'Ver a lista de Pista';
        $auth->add($indexPista);
        // add "indexPista" permission
        $viewPista = $auth->createPermission('viewPista');
        $viewPista->description = 'Ver detalhes do Pista';
        $auth->add($viewPista);
        // add "deletePista" permission
        $deletePista = $auth->createPermission('deletePista');
        $deletePista->description = 'Apagar um Pista';
        $auth->add($deletePista);


        // add "createRecurso" permission
        $createRecurso = $auth->createPermission('createRecurso');
        $createRecurso->description = 'Criar um Recurso';
        $auth->add($createRecurso);
        // add "updateRecurso" permission
        $updateRecurso = $auth->createPermission('updateRecurso');
        $updateRecurso->description = 'Atualiza um Recurso';
        $auth->add($updateRecurso);
        // add "indexRecurso" permission
        $indexRecurso = $auth->createPermission('indexRecurso');
        $indexRecurso->description = 'Ver a lista de Recurso';
        $auth->add($indexRecurso);
        // add "indexRecurso" permission
        $viewRecurso = $auth->createPermission('viewRecurso');
        $viewRecurso->description = 'Ver detalhes do Recurso';
        $auth->add($viewRecurso);
        // add "deleteRecurso" permission
        $deleteRecurso = $auth->createPermission('deleteRecurso');
        $deleteRecurso->description = 'Apagar um Recurso';
        $auth->add($deleteRecurso);


        // add "createTarefa" permission
        $createTarefa = $auth->createPermission('createTarefa');
        $createTarefa->description = 'Criar um Tarefa';
        $auth->add($createTarefa);
        // add "updateTarefa" permission
        $updateTarefa = $auth->createPermission('updateTarefa');
        $updateTarefa->description = 'Atualiza um Tarefa';
        $auth->add($updateTarefa);
        // add "indexTarefa" permission
        $indexTarefa = $auth->createPermission('indexTarefa');
        $indexTarefa->description = 'Ver a lista de Tarefa';
        $auth->add($indexTarefa);
        // add "indexTarefa" permission
        $viewTarefa = $auth->createPermission('viewTarefa');
        $viewTarefa->description = 'Ver detalhes do Tarefa';
        $auth->add($viewTarefa);
        // add "deleteTarefa" permission
        $deleteTarefa = $auth->createPermission('deleteTarefa');
        $deleteTarefa->description = 'Apagar um Tarefa';
        $auth->add($deleteTarefa);


        // add "createUnidademedida" permission
        $createUnidademedida = $auth->createPermission('createUnidademedida');
        $createUnidademedida->description = 'Criar um Unidademedida';
        $auth->add($createUnidademedida);
        // add "updateUnidademedida" permission
        $updateUnidademedida = $auth->createPermission('updateUnidademedida');
        $updateUnidademedida->description = 'Atualiza um Unidademedida';
        $auth->add($updateUnidademedida);
        // add "indexUnidademedida" permission
        $indexUnidademedida = $auth->createPermission('indexUnidademedida');
        $indexUnidademedida->description = 'Ver a lista de Unidademedida';
        $auth->add($indexUnidademedida);
        // add "indexUnidademedida" permission
        $viewUnidademedida = $auth->createPermission('viewUnidademedida');
        $viewUnidademedida->description = 'Ver detalhes do Unidademedida';
        $auth->add($viewUnidademedida);
        // add "deleteUnidademedida" permission
        $deleteUnidademedida = $auth->createPermission('deleteUnidademedida');
        $deleteUnidademedida->description = 'Apagar um Unidademedida';
        $auth->add($deleteUnidademedida);


        // add "createVoo" permission
        $createVoo = $auth->createPermission('createVoo');
        $createVoo->description = 'Criar um Voo';
        $auth->add($createVoo);
        // add "updateVoo" permission
        $updateVoo = $auth->createPermission('updateVoo');
        $updateVoo->description = 'Atualiza um Voo';
        $auth->add($updateVoo);
        // add "indexVoo" permission
        $indexVoo = $auth->createPermission('indexVoo');
        $indexVoo->description = 'Ver a lista de Voo';
        $auth->add($indexVoo);
        // add "indexVoo" permission
        $viewVoo = $auth->createPermission('viewVoo');
        $viewVoo->description = 'Ver detalhes do Voo';
        $auth->add($viewVoo);
        // add "deleteVoo" permission
        $deleteVoo = $auth->createPermission('deleteVoo');
        $deleteVoo->description = 'Apagar um Voo';
        $auth->add($deleteVoo);


        // add "indexItemvenda" permission
        $indexItemvenda = $auth->createPermission('indexItemvenda');
        $indexItemvenda->description = 'Ver o carrinho de compras';
        $auth->add($indexItemvenda);
        // add "createItemvenda" permission
        $createItemvenda = $auth->createPermission('createItemvenda');
        $createItemvenda->description = 'Criar carrinho';
        $auth->add($createItemvenda);
        // add "deleteItemvenda" permission
        $deleteItemvenda = $auth->createPermission('deleteItemvenda');
        $deleteItemvenda->description = 'Apagar uma passagem do carrinho';
        $auth->add($deleteItemvenda);
        // add "siteIndexFO" permission
        $siteIndexFO = $auth->createPermission('siteIndexFO');
        $siteIndexFO->description = 'Ver o siteIndex';
        $auth->add($siteIndexFO);
        // add "updateVenda" permission
        $updateVenda = $auth->createPermission('updateVenda');
        $updateVenda->description = 'efetuar a compra dos itens do carrinho';
        $auth->add($updateVenda);
        // add "deleteVenda" permission
        $deleteVenda = $auth->createPermission('deleteVenda');
        $deleteVenda->description = 'Cancela uma compra';
        $auth->add($deleteVenda);
        // add "logoutFO" permission
        $logoutFO = $auth->createPermission('logoutFO');
        $logoutFO->description = 'efetuar o logout Front Office';
        $auth->add($logoutFO);
        // add "indexVooFO" permission
        $indexVooFO = $auth->createPermission('indexVooFO');
        $indexVooFO->description = 'fazer a pesquisa de voos';
        $auth->add($indexVooFO);
        // add "indexVooFO" permission
        $viewVooFO = $auth->createPermission('indexVooFO');
        $viewVooFO->description = 'Ver os detalhes do voo';
        $auth->add($viewVooFO);



        //roles
        // add "gestorPistas" role and give this role the "createPost" permission
        $gestorPistas = $auth->createRole('gestorPistas');
        $auth->add($gestorPistas);
        $auth->addChild($gestorPistas, $loginBO);
        $auth->addChild($gestorPistas, $siteIndexBO);
        $auth->addChild($gestorPistas, $logoutBO);
        $auth->addChild($gestorPistas, $createAviao);
        $auth->addChild($gestorPistas, $updateAviao);
        $auth->addChild($gestorPistas, $indexAviao);
        $auth->addChild($gestorPistas, $viewAviao);
        $auth->addChild($gestorPistas, $deleteAviao);
        $auth->addChild($gestorPistas, $createClasse);
        $auth->addChild($gestorPistas, $updateClasse);
        $auth->addChild($gestorPistas, $indexClasse);
        $auth->addChild($gestorPistas, $viewClasse);
        $auth->addChild($gestorPistas, $deleteClasse);
        $auth->addChild($gestorPistas, $createCompanhia);
        $auth->addChild($gestorPistas, $updateCompanhia);
        $auth->addChild($gestorPistas, $indexCompanhia);
        $auth->addChild($gestorPistas, $viewCompanhia);
        $auth->addChild($gestorPistas, $deleteCompanhia);
        $auth->addChild($gestorPistas, $createDetalhevoo);
        $auth->addChild($gestorPistas, $updateDetalhevoo);
        $auth->addChild($gestorPistas, $indexDetalhevoo);
        $auth->addChild($gestorPistas, $viewDetalhevoo);
        $auth->addChild($gestorPistas, $deleteDetalhevoo);
        $auth->addChild($gestorPistas, $createEscalavoo);
        $auth->addChild($gestorPistas, $updateEscalavoo);
        $auth->addChild($gestorPistas, $indexEscalavoo);
        $auth->addChild($gestorPistas, $viewEscalavoo);
        $auth->addChild($gestorPistas, $deleteEscalavoo);
        $auth->addChild($gestorPistas, $createHangar);
        $auth->addChild($gestorPistas, $updateHangar);
        $auth->addChild($gestorPistas, $indexHangar);
        $auth->addChild($gestorPistas, $viewHangar);
        $auth->addChild($gestorPistas, $deleteHangar);
        $auth->addChild($gestorPistas, $createOcupacao);
        $auth->addChild($gestorPistas, $updateOcupacao);
        $auth->addChild($gestorPistas, $indexOcupacao);
        $auth->addChild($gestorPistas, $viewOcupacao);
        $auth->addChild($gestorPistas, $deleteOcupacao);
        $auth->addChild($gestorPistas, $createPista);
        $auth->addChild($gestorPistas, $updatePista);
        $auth->addChild($gestorPistas, $indexPista);
        $auth->addChild($gestorPistas, $viewPista);
        $auth->addChild($gestorPistas, $deletePista);
        $auth->addChild($gestorPistas, $createTarefa);
        $auth->addChild($gestorPistas, $updateTarefa);
        $auth->addChild($gestorPistas, $indexTarefa);
        $auth->addChild($gestorPistas, $viewTarefa);
        $auth->addChild($gestorPistas, $deleteTarefa);
        $auth->addChild($gestorPistas, $createVoo);
        $auth->addChild($gestorPistas, $updateVoo);
        $auth->addChild($gestorPistas, $indexVoo);
        $auth->addChild($gestorPistas, $viewVoo);
        $auth->addChild($gestorPistas, $deleteVoo);

        // add "gestorLogistica" role and give this role the "createPost" permission
        $gestorLogistica = $auth->createRole('gestorLogistica');
        $auth->add($gestorLogistica);
        $auth->addChild($gestorLogistica, $loginBO);
        $auth->addChild($gestorLogistica, $siteIndexBO);
        $auth->addChild($gestorLogistica, $logoutBO);
        $auth->addChild($gestorLogistica, $createCategoriarecurso);
        $auth->addChild($gestorLogistica, $updateCategoriarecurso);
        $auth->addChild($gestorLogistica, $indexCategoriarecurso);
        $auth->addChild($gestorLogistica, $viewCategoriarecurso);
        $auth->addChild($gestorLogistica, $deleteCategoriarecurso);
        $auth->addChild($gestorLogistica, $createPedidorecurso);
        $auth->addChild($gestorLogistica, $updatePedidorecurso);
        $auth->addChild($gestorLogistica, $indexPedidorecurso);
        $auth->addChild($gestorLogistica, $viewPedidorecurso);
        $auth->addChild($gestorLogistica, $deletePedidorecurso);
        $auth->addChild($gestorLogistica, $createRecurso);
        $auth->addChild($gestorLogistica, $updateRecurso);
        $auth->addChild($gestorLogistica, $indexRecurso);
        $auth->addChild($gestorLogistica, $viewRecurso);
        $auth->addChild($gestorLogistica, $deleteRecurso);
        $auth->addChild($gestorLogistica, $createUnidademedida);
        $auth->addChild($gestorLogistica, $updateUnidademedida);
        $auth->addChild($gestorLogistica, $indexUnidademedida);
        $auth->addChild($gestorLogistica, $viewUnidademedida);
        $auth->addChild($gestorLogistica, $deleteUnidademedida);

        // add "gestorFinaceiro" role and give this role the "createPost" permission
        $gestorFinaceiro = $auth->createRole('gestorFinaceiro');
        $auth->add($gestorFinaceiro);
        $auth->addChild($gestorFinaceiro, $loginBO);
        $auth->addChild($gestorFinaceiro, $siteIndexBO);
        $auth->addChild($gestorFinaceiro, $logoutBO);
        $auth->addChild($gestorFinaceiro, $createDetalhevoo);
        $auth->addChild($gestorFinaceiro, $updateDetalhevoo);
        $auth->addChild($gestorFinaceiro, $indexDetalhevoo);
        $auth->addChild($gestorFinaceiro, $viewDetalhevoo);
        $auth->addChild($gestorFinaceiro, $deleteDetalhevoo);
        $auth->addChild($gestorFinaceiro, $updatePedidorecurso);
        $auth->addChild($gestorFinaceiro, $indexPedidorecurso);
        $auth->addChild($gestorFinaceiro, $viewPedidorecurso);
        $auth->addChild($gestorFinaceiro, $deletePedidorecurso);
        $auth->addChild($gestorFinaceiro, $indexVoo);
        $auth->addChild($gestorFinaceiro, $viewVoo);

        // add "funcionarioManutencao" role and give this role the "createPost" permission
        $funcionarioManutencao = $auth->createRole('funcionarioManutencao');
        $auth->add($funcionarioManutencao);

        // add "cliente" role and give this role the "createPost" permission
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $loginFO);
        $auth->addChild($cliente, $indexItemvenda);
        $auth->addChild($cliente, $createItemvenda);
        $auth->addChild($cliente, $deleteItemvenda);
        $auth->addChild($cliente, $siteIndexFO);
        $auth->addChild($cliente, $updateVenda);
        $auth->addChild($cliente, $deleteVenda);
        $auth->addChild($cliente, $logoutFO);
        $auth->addChild($cliente, $indexVooFO);
        $auth->addChild($cliente, $viewVooFO);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $gestorPistas);
        $auth->addChild($admin, $gestorLogistica);
        $auth->addChild($admin, $gestorFinaceiro);
        $auth->addChild($admin, $funcionarioManutencao);
        $auth->addChild($admin, $loginFO);
        $auth->addChild($admin, $siteIndexBO);
        $auth->addChild($admin, $logoutBO);
        $auth->addChild($admin, $createAviao);
        $auth->addChild($admin, $updateAviao);
        $auth->addChild($admin, $indexAviao);
        $auth->addChild($admin, $viewAviao);
        $auth->addChild($admin, $deleteAviao);
        $auth->addChild($admin, $createCategoriarecurso);
        $auth->addChild($admin, $updateCategoriarecurso);
        $auth->addChild($admin, $indexCategoriarecurso);
        $auth->addChild($admin, $viewCategoriarecurso);
        $auth->addChild($admin, $deleteCategoriarecurso);
        $auth->addChild($admin, $createClasse);
        $auth->addChild($admin, $updateClasse);
        $auth->addChild($admin, $indexClasse);
        $auth->addChild($admin, $viewClasse);
        $auth->addChild($admin, $deleteClasse);
        $auth->addChild($admin, $createCompanhia);
        $auth->addChild($admin, $updateCompanhia);
        $auth->addChild($admin, $indexCompanhia);
        $auth->addChild($admin, $viewCompanhia);
        $auth->addChild($admin, $deleteCompanhia);
        $auth->addChild($admin, $createDetalhevoo);
        $auth->addChild($admin, $updateDetalhevoo);
        $auth->addChild($admin, $indexDetalhevoo);
        $auth->addChild($admin, $viewDetalhevoo);
        $auth->addChild($admin, $deleteDetalhevoo);
        $auth->addChild($admin, $createEscalavoo);
        $auth->addChild($admin, $updateEscalavoo);
        $auth->addChild($admin, $indexEscalavoo);
        $auth->addChild($admin, $viewEscalavoo);
        $auth->addChild($admin, $deleteEscalavoo);
        $auth->addChild($admin, $createFuncionario);
        $auth->addChild($admin, $updateFuncionario);
        $auth->addChild($admin, $indexFuncionario);
        $auth->addChild($admin, $viewFuncionario);
        $auth->addChild($admin, $deleteFuncionario);
        $auth->addChild($admin, $createHangar);
        $auth->addChild($admin, $updateHangar);
        $auth->addChild($admin, $indexHangar);
        $auth->addChild($admin, $viewHangar);
        $auth->addChild($admin, $deleteHangar);
        $auth->addChild($admin, $createOcupacao);
        $auth->addChild($admin, $updateOcupacao);
        $auth->addChild($admin, $indexOcupacao);
        $auth->addChild($admin, $viewOcupacao);
        $auth->addChild($admin, $deleteOcupacao);
        $auth->addChild($admin, $createPedidorecurso);
        $auth->addChild($admin, $updatePedidorecurso);
        $auth->addChild($admin, $indexPedidorecurso);
        $auth->addChild($admin, $viewPedidorecurso);
        $auth->addChild($admin, $deletePedidorecurso);
        $auth->addChild($admin, $createPista);
        $auth->addChild($admin, $updatePista);
        $auth->addChild($admin, $indexPista);
        $auth->addChild($admin, $viewPista);
        $auth->addChild($admin, $deletePista);
        $auth->addChild($admin, $createRecurso);
        $auth->addChild($admin, $updateRecurso);
        $auth->addChild($admin, $indexRecurso);
        $auth->addChild($admin, $viewRecurso);
        $auth->addChild($admin, $deleteRecurso);
        $auth->addChild($admin, $createTarefa);
        $auth->addChild($admin, $updateTarefa);
        $auth->addChild($admin, $indexTarefa);
        $auth->addChild($admin, $viewTarefa);
        $auth->addChild($admin, $deleteTarefa);
        $auth->addChild($admin, $createUnidademedida);
        $auth->addChild($admin, $updateUnidademedida);
        $auth->addChild($admin, $indexUnidademedida);
        $auth->addChild($admin, $viewUnidademedida);
        $auth->addChild($admin, $deleteUnidademedida);
        $auth->addChild($admin, $createVoo);
        $auth->addChild($admin, $updateVoo);
        $auth->addChild($admin, $indexVoo);
        $auth->addChild($admin, $viewVoo);
        $auth->addChild($admin, $deleteVoo);


        //Assingn roles
        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }
}