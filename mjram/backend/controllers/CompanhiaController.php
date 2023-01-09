<?php

namespace backend\controllers;

use Yii;
use common\models\Companhia;
use app\models\CompanhiaSearch;
use yii\db\IntegrityException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanhiaController implements the CRUD actions for Companhia model.
 */
class CompanhiaController extends Controller
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
                        'roles' => ['indexCompanhia'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['create'],
                        'roles' => ['createCompanhia'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['view'],
                        'roles' => ['viewCompanhia'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['update'],
                        'roles' => ['updateCompanhia'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['delete'],
                        'roles' => ['deleteCompanhia'],
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
     * Lists all Companhia models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new CompanhiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single Companhia model.
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
     * Creates a new Companhia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Companhia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Companhia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Companhia model.
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
     * Finds the Companhia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Companhia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Companhia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
