<?php

namespace backend\modules\api\controllers;
use common\models\Classe;

class ClasseController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Classe';


    public function actionDesignacao($id){
        $model = Classe::findOne(['id'=>$id]);
        return $model->designacao;
    }
}