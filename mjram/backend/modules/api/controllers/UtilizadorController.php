<?php

namespace backend\modules\api\controllers;

use \yii\rest\ActiveController;

class UtilizadorController extends ActiveController
{
    public $modelClass = 'common\models\Utilizador'; //Parte CRUD

    public function actionList()
    {
        $utilizadorModel = new $this->modelClass;
        var_dump($utilizadorModel::find()->all());
            die;
    }


}