<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Recurso;
use common\models\Tarefa;
use yii;

class TarefaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Tarefa';

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

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        unset($actions['create']);
        //unset($actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        $role = Yii::$app->db->createCommand("Select * from auth_assignment where user_id ='".Yii::$app->params['id']."'")->queryOne();
        if($role['item_name'] != 'funcionarioManutencao')
        {
            throw new \yii\web\ForbiddenHttpException('Proibido por nao ser um Funcionario Manutencao!');
        }

//        if($role['item_name'] == 'funcionarioManutencao')
//        {
//            if($action==="create" || $action==="update" || $action==="delete")
//            {
//                throw new \yii\web\ForbiddenHttpException('Proibido! Nao tem acesso a esta funçao!');
//            }
//        }
    }

    public function actionCreate()
    {
        $model = new Tarefa();
        $funcionario = Yii::$app->db->createCommand("Select * from utilizador where id_user='".Yii::$app->params['id']."'")->queryOne();
        $model->load(Yii::$app->request->post(),'');
        $model->id_funcionario_registo = $funcionario['id'];

            if ($model->id_recurso != '' && $model->quantidade == ''){
                throw new \yii\web\ForbiddenHttpException('Tem que enviar a quantidade do recurso!');


            }elseif ($model->id_recurso == '' && $model->quantidade != ''){
                throw new \yii\web\ForbiddenHttpException('Tem que enviar o recurso para puder ter uma quantidade!');
            }else{

                $server = '127.0.0.1';
                $port = 1883;


                $mqtt = new \PhpMqtt\Client\MqttClient($server,$port);

                $mqtt->connect();
                $mqtt->publish('tarefas','Tarefa criada: '.$model->designacao,1);
                $mqtt->disconnect();


                $model->save();
                return $model;
            }
    }


    public function actionUpdate($id){

        $modelTarefa = Tarefa::findOne($id);
        $modelTarefaAntiga = Tarefa::findOne($modelTarefa->id);
        $modelTarefa->load(Yii::$app->request->post(),'');
        $modelRecurso = Recurso::findOne($modelTarefa->id_recurso);

        if(isset($modelTarefa->id_recurso) && $modelTarefa->estado === 'concluido' && $modelTarefaAntiga != 'concluido'){
            $modelRecurso->stockatual = $modelRecurso->stockatual - $modelTarefa->quantidade;
            if($modelRecurso->stockatual<0){
                throw new \yii\web\ForbiddenHttpException('Nao tem recursos suficientes em stock!');
            }
        }

        if($modelTarefa->estado === 'concluido' && $modelTarefaAntiga != 'concluido'){
            $modelTarefa->data_conclusao = date('Y-m-d H:i:s');
        }

        if(isset($modelTarefa->data_inicio) && !isset($modelTarefaAntiga->data_inicio) && strtotime($modelTarefa->data_inicio)<strtotime(date('Y-m-d 00:00:00'))){
            throw new \yii\web\ForbiddenHttpException('A data e horario de inicio nao pode ser inferior ao dia de hoje!');
        }


        if(isset($modelTarefa->id_recurso)){
            $modelRecurso->save();
        }

        $utilizador = Yii::$app->db->createCommand("Select * from utilizador where id_user ='".Yii::$app->params['id']."'")->queryOne();
        $modelTarefa->id_funcionario_responsavel = $utilizador['id'];

        $server = '127.0.0.1';
        $port = 1883;


        $mqtt = new \PhpMqtt\Client\MqttClient($server,$port);

        $mqtt->connect();
        $mqtt->publish('tarefas','Tarefa editada: '.$modelTarefa->designacao,1);
        $mqtt->disconnect();

        $modelTarefa->save();

        return $modelTarefa;

    }


    public function  actionTarefainformation($id){
        $model = Tarefa::findOne($id);
        $utilizador = Yii::$app->db->createCommand("Select * from utilizador where id ='".$model->id_funcionario_registo."'")->queryOne();
        $user = Yii::$app->db->createCommand("Select * from user where id ='".$utilizador["id_user"]."'")->queryOne();
        $tarefa['id'] = $model->id;
        $tarefa['id_voo'] = $model->id_voo;
        $tarefa['username_funcionario_registo'] = $user["username"];
        $tarefa['designacao'] = $model->designacao;
        if ($model->hangar == null){
            $tarefa['id_hangar'] = "null";
        }else{
            $tarefa['id_hangar'] = $model->hangar->designacao;
        }
        if ($model->recurso == null){
            $tarefa['id_recurso'] = "null";
        }else{
            $tarefa['id_recurso'] = $model->recurso->nome;
        }
        $tarefa['estado'] = $model->estado;

        if ($model->recurso == null){
            $tarefa['quantidade'] = "null";
        }else{
            $tarefa['quantidade'] = $model->quantidade;
        }
        $tarefa['data_registo']=$model->data_registo;
        $tarefa['data_inicio'] = $model->data_inicio;
        $tarefa['data_conclusao']=$model->data_conclusao;

        return $tarefa;


    }


//    public function actionDelete($id){
//
//        $modelTarefa = Tarefa::findOne($id);
//        if($modelTarefa->id_funcionario_responsavel == Yii::$app->params['id']){
//            $modelTarefa->delete();
//        }else{
//            throw new \yii\web\ForbiddenHttpException('Nao podes apagar uma tarefa que nao foi ncriada por ti');
//        }
//        return $modelTarefa;
//    }

}