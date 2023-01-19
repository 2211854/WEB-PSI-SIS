<?php

namespace backend\modules\api\controllers;


use backend\modules\api\components\CustomAuth;
use common\models\Recurso;
use yii;

class RecursoController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Recurso';

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


    public function actionGetcategoria($id){
        $model = Recurso::findOne(['id'=>$id]);
        $array['categoria'] = $model->categoria->designacao;
        return $array;
    }

    public function actionGetunidade($id){
        $model = Recurso::findOne(['id'=>$id]);
        $array['unidade'] = $model->unidade->designacao;
        return $array;
    }

//    public function actionAtualizarunidade($id,$uni){
//        $model = Recurso::findOne(['id'=>$id]);
//        $model->nome = $uni;
//        $model->save();
//
//        return $model;
//    }


}