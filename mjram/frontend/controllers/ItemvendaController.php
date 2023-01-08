<?php

namespace frontend\controllers;

use common\models\ItemVenda;
use app\models\ItemvendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemvendaController implements the CRUD actions for ItemVenda model.
 */
class ItemvendaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ItemVenda models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemvendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemVenda model.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($passaporte, $id_voo)
    {
        return $this->render('view', [
            'model' => $this->findModel($passaporte, $id_voo),
        ]);
    }

    /**
     * Creates a new ItemVenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//    public function actionCreate()
//    {
//        $model = new ItemVenda();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing ItemVenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($passaporte, $id_voo)
    {
        $model = $this->findModel($passaporte, $id_voo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ItemVenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($passaporte, $id_voo)
    {
        $this->findModel($passaporte, $id_voo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItemVenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return ItemVenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($passaporte, $id_voo)
    {
        if (($model = ItemVenda::findOne(['passaporte' => $passaporte, 'id_voo' => $id_voo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
