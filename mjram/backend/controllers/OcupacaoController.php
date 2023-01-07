<?php

namespace backend\controllers;

use Yii;
use common\models\Ocupacao;
use common\models\Aviao;
use app\models\OcupacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * OcupacaoController implements the CRUD actions for ocupacao model.
 */
class OcupacaoController extends Controller
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
     * Lists all ocupacao models.
     * @return mixed
     */
    public function actionIndex($aviaoid)
    {
        $aviao = Aviao::findOne($aviaoid);
        $searchModel = new OcupacaoSearch();

        $dataProvider = new ActiveDataProvider(['query' => $aviao->getOcupacaos(),]);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'aviao' => $aviao,
        ]);
    }

    /**
     * Displays a single ocupacao model.
     * @param string $id_aviao Id Aviao
     * @param string $id_classe Id classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_aviao, $id_classe)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_aviao, $id_classe),
        ]);
    }

    /**
     * Creates a new ocupacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($aviaoid)
    {
        $model = new ocupacao();
        $model->id_aviao = $aviaoid;

        if($this->request->isPost){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_aviao' => $model->id_aviao, 'id_classe' => $model->id_classe]);
            }
        } else{
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ocupacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_aviao Id Aviao
     * @param string $id_classe Id classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_aviao, $id_classe)
    {
        $model = $this->findModel($id_aviao, $id_classe);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_aviao' => $model->id_aviao, 'id_classe' => $model->id_classe]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ocupacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_aviao Id Aviao
     * @param string $id_classe Id classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_aviao, $id_classe)
    {
        $this->findModel($id_aviao, $id_classe)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ocupacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_aviao Id Aviao
     * @param string $id_classe Id classe
     * @return ocupacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_aviao, $id_classe)
    {
        if (($model = ocupacao::findOne(['id_aviao' => $id_aviao, 'id_classe' => $id_classe])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
