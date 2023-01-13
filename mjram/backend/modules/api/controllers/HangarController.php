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
        if(Yii::$app->params['id'] == 1)
        {

            if($action==="create")
            {
                throw new \yii\web\ForbiddenHttpException('Proibido');
            }
        }
    }

}