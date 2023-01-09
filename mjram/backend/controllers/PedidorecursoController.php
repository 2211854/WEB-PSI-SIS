<?php

namespace backend\controllers;

use Yii;
use common\models\PedidoRecurso;
use common\models\Recurso;
use app\models\PedidorecursoSearch;
use yii\db\IntegrityException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidorecursoController implements the CRUD actions for PedidoRecurso model.
 */
class PedidorecursoController extends Controller
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
     * Lists all PedidoRecurso models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new PedidorecursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single PedidoRecurso model.
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
     * Creates a new PedidoRecurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($recursoid = null)
    {
        //adicionar automaticamente o id do funcionario atual
        //adicionar o estado e data de registo automaticamente acho que ja faz pela base de dados
        $model = new PedidoRecurso();
        if ($recursoid!=null){
            $model->id_recurso = $recursoid;
        }

        if ($model->load(Yii::$app->request->post())) {
            $funcionario = Yii::$app->db->createCommand("Select * from utilizador where id_user='".Yii::$app->user->id."'")->queryOne();
            $model->id_funcionario = $funcionario['id'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PedidoRecurso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $estadoAtual=$model->estado;

        if ($model->load(Yii::$app->request->post())) {
            if($model->estado == 'entregue' && $estadoAtual!='entregue'){

                $modelRecurso = Recurso::findOne($model->id_recurso);
                $modelRecurso->stockatual = $modelRecurso->stockatual + $model->quantidade;
                $modelRecurso->save();

            }elseif ($model->estado == 'devolvido' && $estadoAtual=='entregue'){
                $modelRecurso = Recurso::findOne($model->id_recurso);
                $modelRecurso->stockatual = $modelRecurso->stockatual - $model->quantidade;
                $modelRecurso->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PedidoRecurso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try
        {
            $this->findModel($id)->delete();
        }
        catch(IntegrityException $e)
        {
            // Cannot delete or update a parent row: a foreign key constraint fails
            if($e->errorInfo[1] == 1451 )
            {
                return $this->redirect(['index','message'=>'Nao pode eliminar dados que estejam a ser utilizados!']);
            }
            else{
                throw $e;
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the PedidoRecurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return PedidoRecurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoRecurso::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
