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
    public function actionIndex($vooid,$message = null)
    {
        $voo = Voo::findOne($vooid);
        $searchModel = new EscalavooSearch();
        $dataProvider = new ActiveDataProvider(['query' => $voo->getEscalaVoos(),]);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'voo' => $voo,
            'message' => $message
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
        $first=false;
        $minimo = null;

        $escalasvoo = Yii::$app->db->createCommand("Select * from escala_voo where id_voo='".$model->id_voo."' ORDER BY id DESC")->queryOne();
        if($escalasvoo != null){
            $model->partida = $escalasvoo['destino'];
            $minimo = $escalasvoo['horario_chegada'];
        }else{
            $first=true;
        }

        if($this->request->isPost){
            if ($model->load(Yii::$app->request->post()) ) {
                //verificar se a data e horario de chegada e inferior ao da partida
                if (strtotime($model->horario_chegada)<strtotime($model->horario_partida)){
                    return $this->render('create', [
                        'model' => $model,
                        'voo' => $voo,
                        'actionStatus' => 'warning',
                        'message' => 'A data e horario de chegada nao pode ser inferior ao da partida!',
                        'first'=>$first,
                        'minimo' =>$minimo,
                    ]);
                }else{
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'voo' => $voo,
                    'actionStatus' => 'warning',
                    'message' => null,
                    'first'=>$first,
                    'minimo' =>$minimo,
                ]);
            }
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'voo' => $voo,
            'actionStatus' => null,
            'message' => null,
            'first'=>$first,
            'minimo' =>$minimo,
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

        $escalasvoo = Yii::$app->db->createCommand("Select * from escala_voo where id_voo='".$model->id_voo."' ORDER BY id DESC")->queryOne();
        $escalasvooanterior = Yii::$app->db->createCommand("select * from escala_voo where id = (select max(id) from escala_voo where id < '".$model->id."' AND id_voo = '".$model->id_voo."');")->queryOne();
        $escalasvooseguinte = Yii::$app->db->createCommand("select * from escala_voo where id = (select min(id) from escala_voo where id > '".$model->id."' AND id_voo = '".$model->id_voo."');")->queryOne();
        if($escalasvooanterior != false){
            $escalasvooanterior = $escalasvooanterior['horario_chegada'];
        }
        if($escalasvooseguinte != false){
            $escalasvooseguinte = $escalasvooseguinte['horario_partida'];
        }

        if($this->request->isPost){
            if ($model->load(Yii::$app->request->post())) {
                //verificar se a data e horario de chegada e inferior ao da partida
                if (strtotime($model->horario_chegada)<strtotime($model->horario_partida)){
                    return $this->render('update', [
                        'model' => $model,
                        'actionStatus' => 'warning',
                        'message' => 'A data e horario de chegada nao pode ser inferior ao da partida!',
                        'escalasvooseguinte' => $escalasvooseguinte,
                        'escalasvooanterior' => $escalasvooanterior,
                    ]);
                }else{
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'actionStatus' => 'warning',
                    'message' => 'algo',
                    'escalasvooseguinte' => $escalasvooseguinte,
                    'escalasvooanterior' => $escalasvooanterior,
                ]);
            }
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'actionStatus' => null,
            'message' => null,
            'escalasvooseguinte' => $escalasvooseguinte,
            'escalasvooanterior' => $escalasvooanterior,
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

        $model = $this->findModel($id);

        $vooid = $model->id_voo;
        $escalasvooanterior = Yii::$app->db->createCommand("select * from escala_voo where id = (select max(id) from escala_voo where id < '".$model->id."' AND id_voo = '".$model->id_voo."');")->queryOne();
        $escalasvooseguinte = Yii::$app->db->createCommand("select * from escala_voo where id = (select min(id) from escala_voo where id > '".$model->id."' AND id_voo = '".$model->id_voo."');")->queryOne();
        if($escalasvooanterior != false && $escalasvooseguinte != false){
            return $this->redirect(['index','vooid'=>$vooid,'message' => 'Nao é possivel eliminar esta escala pois existem escalas anteriores e posteriores']);;
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index','vooid'=>$vooid]);
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
