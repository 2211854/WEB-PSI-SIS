<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Utilizador;
use Yii;

class FuncionarioController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Funcionario';

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

    public function actionGetutilizador($id){
        $model = Utilizador::findOne($id);
        return $model;
    }

    public function actionGetuser($id){
        return $this->actionGetutilizador($id)->user;
    }

    public function actionGetrole($id){
        $modelUtilizador = $this->actionGetutilizador($id);
        $userRole = Yii::$app->db ->createCommand("Select * from auth_assignment where user_id='".$modelUtilizador->id_user."'")->queryOne();
        return $userRole['item_name'];
    }
}