<?php

namespace backend\modules\api\controllers;
use common\models\Classe;
use yii\filters\auth\HttpBasicAuth;
use yii;

class AuthController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Classe';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        $role = Yii::$app->db->createCommand("Select * from auth_assignment where user_id ='".$user->id."'")->queryOne();
        if($role['item_name'] != 'funcionarioManutencao')
        {
            throw new \yii\web\ForbiddenHttpException('Proibido por nao ser um Funcionario Manutencao!');
        }
        if ($user && $user->validatePassword($password))
        {
            $this->user = $user;
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }


    public function actionLogin(){

        return $this->user->auth_key;
    }
}
