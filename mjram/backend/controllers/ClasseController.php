<?php

namespace backend\controllers;

use Yii;
use common\models\Classe;
use app\models\ClasseSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\IntegrityException;

/**
 * ClasseController implements the CRUD actions for classe model.
 */
class ClasseController extends Controller
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
                            'roles' => ['indexClasse'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['create'],
                            'roles' => ['createClasse'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['view'],
                            'roles' => ['viewClasse'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['update'],
                            'roles' => ['updateClasse'],
                        ],
                        [
                            'allow' => true,
                            'actions'=> ['delete'],
                            'roles' => ['deleteClasse'],
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
     * Lists all classe models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new ClasseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single classe model.
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
     * Creates a new classe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Classe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing classe model.
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
     * Deletes an existing classe model.
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
     * Finds the classe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Classe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
