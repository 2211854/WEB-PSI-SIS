<?php

namespace frontend\controllers;

use common\models\Voo;
use common\models\EscalaVoo;
use common\models\DetalheVoo;

use app\models\VooSearch;
use DateTime;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use Yii;
use yii\debug\models\timeline\DataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use function PHPUnit\Framework\isEmpty;

/**
 * VooController implements the CRUD actions for Voo model.
 */
class VooController extends Controller
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
                            'roles' => ['indexVooFO'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['view'],
                            'roles' => ['indexVooFO'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'index' => ['GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Voo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $params = $this->request->get();
        if(isset($params['partida']) && isset($params['destino'])){
            $listaVoos = Voo::findAll(['estado'=>'planeado']);
            $listaVoosEncontrados = [];

            $data = new DateTime($params['data']);
            $data = $data->format('Y-m-d');
            $datahoje = (new DateTime())->format('Y-m-d');
            foreach ($listaVoos as $voo) {

                $model = $this->findModel($voo->id);
                $escalasVoo = $model->escalaVoos;
                $indiceMaximo = count($escalasVoo) - 1;
                if($indiceMaximo >=0)
                {
                    $datapartida = new DateTime($escalasVoo[0]->horario_partida);
                    $datapartida = $datapartida->format('Y-m-d');

                    if($data == $datapartida || $params['data'] == ''){
                        var_dump($model->detalheVoos);

                        if ($this->isLike("%" . $escalasVoo[0]->partida . "%", $params['partida']) && $escalasVoo[0]->horario_partida ) {
                            if ($this->isLike("%" . $escalasVoo[$indiceMaximo]->destino . "%", $params['destino'])) {
                                $listaVoosEncontrados[] = array('voo'=> $voo,'detalhes' => $model->detalheVoos, 'escalas'=> $model->escalaVoos);
                            }
                        }

                    }

                }
            }

            return $this->render('index', [
                'destino' => $params['destino'],
                'partida' => $params['partida'],
                'listaVoos' => $listaVoosEncontrados
            ]);

        }
        Yii::$app->session->setFlash('danger','Não foram reconhecidos os dados de pesquisa');
        $this->redirect(['site/error']);


    }

    //SELECT DISTINCT * from voo,escala_voo,detalhe_voo WHERE voo.id = escala_voo.id_voo AND voo.id = detalhe_voo.id;
    /**
     * Displays a single Voo model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $detalhe = DetalheVoo::findOne(['id' => $id]);
        $voo = $detalhe->voo;
        $numeroEscalas = count($voo->escalaVoos) - 1;
        $destino = $voo->escalaVoos[$numeroEscalas]->destino;
        $partida = $voo->escalaVoos[0]->partida;

        return $this->render('view', [
            'destino' => $destino,
            'partida' => $partida,
            'voo'=> $voo,
            'detalhe' => $detalhe,
            'escalas'=> $voo->escalaVoos
        ]);
    }

    /**
     * Creates a new Voo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//    public function actionCreate()
//    {
//        $model = new Voo();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing Voo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Voo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Voo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Voo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Voo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    function isLike($needle, $haystack)
    {
        $needle = strtoupper($needle);
        $regex = '/' . str_replace('%', '.*?', $needle) . '/';

        return preg_match($regex, strtoupper($haystack)) > 0;
    }

}
