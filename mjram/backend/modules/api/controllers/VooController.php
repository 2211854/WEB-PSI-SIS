<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Voo;
use yii\filters\auth\QueryParamAuth;
use yii;

class VooController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Voo';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
            'except'=>[],
        ];
        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        $role = Yii::$app->db->createCommand("Select * from auth_assignment where user_id ='".Yii::$app->params['id']."'")->queryOne();
        if($role['item_name'] != 'funcionarioManutencao')
        {
            throw new \yii\web\ForbiddenHttpException('Proibido por nao ser um Funcionario Manutencao!');
        }

        if($role['item_name'] == 'funcionarioManutencao')
        {
            if($action==="create" || $action==="update" || $action==="delete")
            {
                throw new \yii\web\ForbiddenHttpException('Proibido! Nao tem acesso a esta funçao!');
            }
        }
    }

    //Obter designacao e modelo do aviao (ex. Getaviaolabel do id 2 retorna Boeing 777 - Estado
    public function  actionGetaviaolabel($id){
        $model = Voo::findOne([$id]);
        $estado =  $model->aviao->estado;
        $marca = $model->aviao->marca;
        $modelo = $model->aviao->modelo;
        return  "$marca $modelo - $estado";
    }
    //Obter companhia aerea (a partir do aviao - companhia)
    public function  actionGetcompanhia($id){
        $model = Voo::findOne([$id]);
        $nomeCompanhia =  $model->aviao->companhia->nome;
        return $nomeCompanhia;
    }
    //obter lista de classes possiveis e respetivas lotacoes maximas (a partir do aviao->ocupacao)
    public function actionGetclasses($id){
        $model = Voo::findOne([$id]);
        $ocupacoes = $model->aviao->ocupacaos;
        $dados = [];

        foreach ($ocupacoes as $ocupacaos){
            $designacao = $ocupacaos->classe->designacao;
            $ocupacao = $ocupacaos->ocupacao;
            $dados[$designacao] = $ocupacao;
        }
        return $dados;
    }
    //obter contagem de bilhetes adquiridos (itens-venda de vendas nao canceladas)
    public function actionGetbilhetes($id){
        $model = Voo::findOne([$id]);
        $itensvendas = $model->itemVendas;
        $nmrvendas = 0;

        foreach ($itensvendas as $itensvenda){
            if ($itensvenda->venda->estado == 'pago'){
                $nmrvendas += 1;
            }
        }
        return ['contagem'=>$nmrvendas];

    }

}