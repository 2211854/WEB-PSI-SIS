<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use Yii;

class HangarController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Hangar';

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

}