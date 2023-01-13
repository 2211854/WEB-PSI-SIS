<?php

namespace backend\modules\api\controllers;
use common\models\Classe;
use yii\filters\auth\HttpBasicAuth;

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
