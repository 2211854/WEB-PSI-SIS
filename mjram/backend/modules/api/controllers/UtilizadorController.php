<?php

namespace backend\modules\api\controllers;

use \yii\rest\ActiveController;

class UtilizadorController extends ActiveController
{
    public $modelClass = 'common\models\User'; //Parte CRUD

    public function actionIndex(){
        $this->render('index');
    }

    public function actionList()
    {
        $utilizadorModel = new $this->modelClass;
        return $utilizadorModel::find()->all();
    }


}