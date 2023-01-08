<?php

namespace frontend\controllers;

use common\models\DetalheVoo;
use common\models\ItemVenda;
use common\models\Utilizador;
use common\models\Venda;
use app\models\VendaSearch;
use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
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
     * Lists all Venda models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venda model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {

        if(!Yii::$app->user->isGuest){
            $detalhevoo = DetalheVoo::findOne(['id'=>$id]);

            $utilizadorCliente = Utilizador::findOne(['id_user' => Yii::$app->user->id ]);
            $modelVenda = Venda::findOne(['id_cliente' => $utilizadorCliente->id, 'estado' => 'carrinho']);
            $modelVenda = ($modelVenda == null ? new Venda() : $modelVenda);
            $modelVenda->id_cliente = $utilizadorCliente->id;
            $modelVenda->save();
            $modelItemVenda = new ItemVenda();
            var_dump($this->request->post());
            if ($this->request->isPost) {
                $modelItemVenda->passaporte = ($this->request->post())['passaporte'];
                $modelItemVenda->id_venda = $modelVenda->id;
                $modelItemVenda->id_classe = $detalhevoo->id_classe;
                $modelItemVenda->id_voo = $detalhevoo->id_voo;
                $modelItemVenda->save();
                return $this->redirect(['itemvenda/index', 'id' => $modelVenda->id]);
            }

        }
        else{
            return $this->redirect(['site/login']);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCarrinho()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('carrinho', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Venda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
