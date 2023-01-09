<?php

namespace backend\controllers;

use Yii;
use common\models\Aviao;
use common\models\Companhia;
use app\models\AviaoSearch;
use yii\db\Exception;
use yii\db\IntegrityException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AviaoController implements the CRUD actions for Aviao model.
 */
class AviaoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' =>[
                    [
                        'allow' => true,
                        'actions'=> ['index'],
                        'roles' => ['indexAviao'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['create'],
                        'roles' => ['createAviao'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['view'],
                        'roles' => ['viewAviao'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['update'],
                        'roles' => ['updateAviao'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['delete'],
                        'roles' => ['deleteAviao'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aviao models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new AviaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single Aviao model.
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
     * Creates a new Aviao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aviao();


        if ($model->load(Yii::$app->request->post())) {
            if($model->combustivelmaximo < $model->combustivelatual){
                return $this->render('create', [
                    'model' => $model,
                    'message' => 'O combustivel atual nao pode ser superior ao maximo!',
                ]);
            }else{
                $model->save();
                $modelCompanhia = Companhia::findOne($model->id_companhia);
                $model->designacao = $modelCompanhia->sigla.$model->id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
            'message' => null,
        ]);
    }

    /**
     * Updates an existing Aviao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelCompanhia = Companhia::findOne($model->id_companhia);
            $model->designacao = $modelCompanhia->sigla.$model->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aviao model.
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
     * Finds the Aviao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Aviao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aviao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
