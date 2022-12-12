<?php

namespace backend\modules\api\controllers;
use yii\filters\auth\HttpBasicAuth;

use yii\rest\ActiveController;

class ClienteController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTotal()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return 	['total' => count($recs)];
    }

    public function actionMorada($id)    {
        $climodel = new $this->modelClass;
        $rec = $climodel::find()->where("id=".$id)->one();
        if($rec)
            return ['id' => $id, 'Morada' => $rec->morada];
        return ['id' => $id, 'Morada' => "null"];
    }

    public function actionSet($limite){
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->limit($limite)->all();
        return ['limite' => $limite, 'Records' => $recs];
    }



}
