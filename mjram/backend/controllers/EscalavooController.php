<?php

namespace backend\controllers;

use Yii;
use common\models\EscalaVoo;
use common\models\Voo;
use app\models\EscalavooSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * EscalavooController implements the CRUD actions for EscalaVoo model.
 */
class EscalavooController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EscalaVoo models.
     * @return mixed
     */
    public function actionIndex($vooid)
    {
        $voo = Voo::findOne($vooid);
        $searchModel = new EscalavooSearch();
        $dataProvider = new ActiveDataProvider(['query' => $voo->getEscalaVoos(),]);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'voo' => $voo,
        ]);
    }

    /**
     * Displays a single EscalaVoo model.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EscalaVoo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($vooid)
    {
        $model = new EscalaVoo();
        $voo = Voo::findOne($vooid);
        $model->id_voo = $vooid;
        if($this->request->isPost){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'voo' => $voo,
                    'actionStatus' => 'warning',
                ]);
            }
        }else{
            $model->loadDefaultValues();
        }


        return $this->render('create', [
            'model' => $model,
            'voo' => $voo,
            'actionStatus' => null,
        ]);
    }

    /**
     * Updates an existing EscalaVoo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($this->request->isPost){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'actionStatus' => 'warning',
                ]);
            }
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'actionStatus' => null,
        ]);
    }

    /**
     * Deletes an existing EscalaVoo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EscalaVoo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return EscalaVoo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EscalaVoo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
