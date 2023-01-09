<?php

namespace backend\controllers;

use Yii;
use common\models\CategoriaRecurso;
use app\models\CategoriarecursoSearch;
use yii\db\IntegrityException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoriarecursoController implements the CRUD actions for CategoriaRecurso model.
 */
class CategoriarecursoController extends Controller
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
                        'roles' => ['indexCategoriarecurso'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['create'],
                        'roles' => ['createCategoriarecurso'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['view'],
                        'roles' => ['viewCategoriarecurso'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['update'],
                        'roles' => ['updateCategoriarecurso'],
                    ],
                    [
                        'allow' => true,
                        'actions'=> ['delete'],
                        'roles' => ['deleteCategoriarecurso'],
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
     * Lists all CategoriaRecurso models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new CategoriarecursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single CategoriaRecurso model.
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
     * Creates a new CategoriaRecurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoriaRecurso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CategoriaRecurso model.
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
     * Deletes an existing CategoriaRecurso model.
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
     * Finds the CategoriaRecurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return CategoriaRecurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CategoriaRecurso::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
