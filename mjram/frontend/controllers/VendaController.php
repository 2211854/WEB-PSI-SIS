<?php

namespace frontend\controllers;


use common\models\DetalheVoo;
use common\models\ItemVenda;
use common\models\Utilizador;
use common\models\Venda;
use app\models\VendaSearch;
use Yii;
use DateTime;
use yii\filters\AccessControl;
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
                'access' => [
                    'class' => AccessControl::class,
                    'rules' =>[
                        [
                            'allow' => true,
                            'actions'=> ['index'],
                            'roles' => ['updateVenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['view'],
                            'roles' => ['updateVenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['delete'],
                            'roles' => ['updateVenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['imprimir'],
                            'roles' => ['updateVenda'],
                        ],
                    ],
                ],
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
    public function actionIndex() //historico de compras
    {
        $utilizador = Utilizador::findOne(['id_user'=>\Yii::$app->user->id]);

        $Vendas = Venda::findAll(['id_cliente' => $utilizador->id]);

        $utilizador = Utilizador::findOne(['id_user'=>Yii::$app->user->id]);
        $subtotal = 0;

        $subtotais = [];
        $listaVendas = [];

        foreach ($Vendas as $venda)
        {

            $itensvenda=ItemVenda::findAll(['id_venda'=>$venda->id]);
            $detalhesvoo = DetalheVoo::find()->all();

            foreach ($itensvenda as $itemvenda)
            {
                foreach( $detalhesvoo as $detalhe)
                {
                    if($detalhe->id_classe == $itemvenda->classe->id){
                        $subtotal+=$detalhe->preço;
                    }
                }

            }

            if($venda->estado != 'carrinho')
            {
                $subtotais[$venda->id] = $subtotal ;
                $listaVendas[] = $venda;
            }

            $subtotal= 0;

        }
        return $this->render('index', [
            'subtotais' => $subtotais,
            'listaVendas' => $listaVendas,
        ]);
    }

    /**
     * Displays a single Venda model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//    public function actionCreate($id)
//    {
//
//
//    }


    /**
     * Updates an existing Venda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $modelUtilizador = Utilizador::findOne(['id_user'=> \Yii::$app->user->id]);

        $model = Venda::findOne(['estado'=>'carrinho','id_cliente'=> $modelUtilizador->cliente->id,'data_compra'=>null]);

        if (isset($model) && count($model->itemVendas)>0){
            $model->estado = 'pago';
            $model->data_compra = (new DateTime())->format('Y-m-d H:i:s');
            if($model->save()){
                Yii::$app->session->setFlash('success','O carrinho foi concluido com sucesso');
            }

        }
        Yii::$app->session->setFlash('warning','Não foi possivel efetuar o pagamento visto que o carrinho encontra-se vazio');
        $this->redirect(['venda/index']);

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
        $model = $this->findModel($id);
        if ($model->estado != 'carrinho'){
            $model->estado= 'cancelado';
            $model->save();
        }
        Yii::$app->session->setFlash('success','Fatura cancelada com sucesso');
        return $this->redirect(['venda/index']);
    }

    public function actionImprimir($id){
        $utilizador = Utilizador::findOne(['id_user'=>\Yii::$app->user->id]);

        $venda = Venda::findOne(['id' => $id]);

        $subtotal = 0;

        $subtotais = [];

        if($venda->estado == 'pago')
        {

            $itensvenda=ItemVenda::findAll(['id_venda'=> $venda->id]);
            $detalhesvoo = DetalheVoo::find()->all();

            foreach ($itensvenda as $itemvenda)
            {
                foreach( $detalhesvoo as $detalhe)
                {
                    if($detalhe->id_classe == $itemvenda->classe->id){
                        $subtotal+=$detalhe->preço;
                    }
                }

            }


        }


        return $this->render('imprimir', [
            'subtotal' => $subtotal,
            'venda' => $venda,
        ]);
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
