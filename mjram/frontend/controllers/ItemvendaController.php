<?php

namespace frontend\controllers;

use common\models\DetalheVoo;
use common\models\ItemVenda;
use app\models\ItemvendaSearch;
use common\models\Voo;
use yii;
use common\models\Utilizador;
use common\models\Venda;
use yii\filters\AccessControl;
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
                'access' => [
                    'class' => AccessControl::class,
                    'rules' =>[
                        [
                            'allow' => true,
                            'actions'=> ['index'],
                            'roles' => ['indexItemvenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['view'],
                            'roles' => ['viewItemvenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['delete'],
                            'roles' => ['deleteItemvenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['imprimir'],
                            'roles' => ['indexItemvenda'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['create'],
                            'roles' => ['indexItemvenda'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['post'],
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
    public function actionIndex()//carrinho
    {
        $searchModel = new ItemvendaSearch();

        $subtotal = 0;

        $utilizador = Utilizador::findOne(['id_user'=>Yii::$app->user->id]);
        $modelVenda = Venda::findOne(['estado'=>'carrinho','id_cliente'=>$utilizador->id]);
        $modelVenda = $modelVenda == null ? new Venda() : $modelVenda;
        $modelVenda->id_cliente = $utilizador->id;

        $modelVenda->save();
        $model=ItemVenda::findAll(['id_venda'=>$modelVenda->id]);
        $detalhesvoo = DetalheVoo::find()->all();

        foreach ($model as $itemvenda)
        {
            foreach( $detalhesvoo as $detalhe)
            {
                if($detalhe->id_classe == $itemvenda->classe->id){
                    $subtotal+=$detalhe->preço;
                }
            }

        }

        $dataProvider = $searchModel->search([]);
        $dataProvider->query->andWhere(['id_venda'=>$modelVenda->id]);
        return $this->render('index', [
            'subtotal' =>$subtotal,
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
//    public function actionView($passaporte, $id_voo)
//    {
//
//        return $this->render('view', [
//            'model' => $this->findModel($passaporte, $id_voo),
//        ]);
//    }

    /**
     * Creates a new ItemVenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        if(!Yii::$app->user->isGuest){
            $detalhevoo = DetalheVoo::findOne(['id'=>$id]);

            $utilizadorCliente = Utilizador::findOne(['id_user' => Yii::$app->user->id ]);
            $modelVenda = Venda::findOne(['id_cliente' => $utilizadorCliente->id, 'estado' => 'carrinho']);
            $modelVenda = $modelVenda == null ? new Venda() : $modelVenda;
            $modelVenda->id_cliente = $utilizadorCliente->id;

            $modelVenda->save();
            $modelItemVenda = new ItemVenda();

            if ($this->request->isPost) {
                $modelItemVenda->passaporte = ($this->request->post())['passaporte'];
                $modelItemVenda->id_venda = $modelVenda->id;
                $modelItemVenda->id_classe = $detalhevoo->id_classe;
                $modelItemVenda->id_voo = $detalhevoo->id_voo;
                $modelItemVenda->save();
                Yii::$app->session->setFlash('success','O Item foi adicionado ao carrinho');
                return $this->redirect(['itemvenda/index', 'id' => $modelVenda->id]);
            }

        }
        else{
            return $this->redirect(['site/login']);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Updates an existing ItemVenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     *
     * */

//    public function actionUpdate($passaporte, $id_voo)
//    {
//        $model = $this->findModel($passaporte, $id_voo);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing ItemVenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $passaporte Passaporte
     * @param string $id_voo Id Voo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model = ItemVenda::findOne(['id'=> $id]);
        $model->delete();
        Yii::$app->session->setFlash('warning','Item removido do carrinho');
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
