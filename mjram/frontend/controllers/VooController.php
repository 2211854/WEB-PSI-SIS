<?php

namespace frontend\controllers;

use common\models\Voo;
use common\models\EscalaVoo;
use common\models\DetalheVoo;

use app\models\VooSearch;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
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
     * Lists all Voo models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $params = $this->request->get();
        var_dump($params);

//        $listaVoos = $this->findListaVoos($params);



        $listaVoos = Voo::find()->all();
        $listaVoosEncontrados = [];
        foreach ($listaVoos as $voo) {
            $model = $this->findModel($voo->id);

            $escalasVoo = $model->escalaVoos;
            $indiceMaximo = count($escalasVoo) - 1;
            if ($this->isLike("%" . $escalasVoo[0]->partida . "%", $params['partida']) && $escalasVoo[0]->horario_partida ) {
                if ($this->isLike("%" . $escalasVoo[$indiceMaximo]->destino . "%", $params['chegada'])) {
                   // $trajeto
                    $listaVoosEncontrados[] = array('voo'=> $voo,'detalhes' => $model->detalheVoos, 'escalas'=> $model->escalaVoos);
                }
            }
        }

        return $this->render('index', [

            'destino' => $params['chegada'],
            'partida' => $params['partida'],
            'listaVoos' => $listaVoosEncontrados,
        ]);


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
        return $this->render('view', [
            'model' => $this->findModel($id),
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

    protected function  findListaVoos($queryParams)
    {

        return false;
    }

    function isLike($needle, $haystack)
    {
        $regex = '/' . str_replace('%', '.*?', $needle) . '/';

        return preg_match($regex, $haystack) > 0;
    }

}
