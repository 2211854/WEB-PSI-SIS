<?php

namespace backend\modules\api\controllers;

use common\models\Utilizador;
use Yii;

class FuncionarioController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Funcionario';

    public function actionGetutilizador($id){
        $model = Utilizador::findOne(['id'=>$id]);
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