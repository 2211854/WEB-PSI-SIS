<?php

namespace backend\modules\api\controllers;


use common\models\Recurso;

class RecursoController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Recurso';




    public function actionGetcategoria($id){
        $model = Recurso::findOne(['id'=>$id]);
        return $model->categoria->designacao;
    }


}