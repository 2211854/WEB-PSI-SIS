<?php

namespace backend\controllers;

use Yii;
use common\models\DetalheVoo;
use app\models\DetalhevooSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalhevooController implements the CRUD actions for DetalheVoo model.
 */
class DetalhevooController extends Controller
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
     * Lists all DetalheVoo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetalhevooSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetalheVoo model.
     * @param string $id_voo Id Voo
     * @param string $id_classe Id Classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_voo, $id_classe)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_voo, $id_classe),
        ]);
    }

    /**
     * Creates a new DetalheVoo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetalheVoo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_voo' => $model->id_voo, 'id_classe' => $model->id_classe]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetalheVoo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_voo Id Voo
     * @param string $id_classe Id Classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_voo, $id_classe)
    {
        $model = $this->findModel($id_voo, $id_classe);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_voo' => $model->id_voo, 'id_classe' => $model->id_classe]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetalheVoo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_voo Id Voo
     * @param string $id_classe Id Classe
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_voo, $id_classe)
    {
        $this->findModel($id_voo, $id_classe)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetalheVoo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_voo Id Voo
     * @param string $id_classe Id Classe
     * @return DetalheVoo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_voo, $id_classe)
    {
        if (($model = DetalheVoo::findOne(['id_voo' => $id_voo, 'id_classe' => $id_classe])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
