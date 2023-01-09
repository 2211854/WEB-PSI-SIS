<?php

namespace backend\controllers;

use Yii;
use common\models\Funcionario;
use common\models\User;
use common\models\Utilizador;
use app\models\FuncionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionarioController implements the CRUD actions for Funcionario model.
 */
class FuncionarioController extends Controller
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
     * Lists all Funcionario models.
     * @return mixed
     */
    public function actionIndex($message = null)
    {
        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single Funcionario model.
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
     * Creates a new Funcionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $auth = Yii::$app->authManager;
        $roles = [];
        foreach ($auth->getroles() as $role){
            if($role->name != 'cliente' && $role->name != 'admin')
                array_push($roles, [$role->name => $role->name] );
        }
        $modelFuncionario = new Funcionario();
        $modelUtilizador = new Utilizador();
        $modelUser = new User();

        if ($modelFuncionario->load(Yii::$app->request->post()) && $modelUtilizador->load(Yii::$app->request->post())) {

            $modelUser->username = $modelUtilizador->username;
            $modelUser->email = $modelUtilizador->email;
            $modelUser->setPassword($modelUtilizador->password);
            $modelUser->generateAuthKey();
            $modelUser->generateEmailVerificationToken();

            $modelUser->status = 10;
            $modelUser->save();
            $auth = \Yii::$app->authManager;
            $userRole = $auth->getRole($modelUtilizador->role);
            $auth->assign($userRole, $modelUser->getId());

            $modelUtilizador->id_user = $modelUser->getId();
            $modelUtilizador->save(false);
            $modelFuncionario->id = $modelUtilizador->id;
            $modelFuncionario->save();



            return $this->redirect(['view', 'id' => $modelFuncionario->id]);
        }

        return $this->render('create', [
            'modelFuncionario' => $modelFuncionario,
            'modelUtilizador' => $modelUtilizador,
            'roles' => $roles,
        ]);
    }

    /**
     * Updates an existing Funcionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelFuncionario = Funcionario::findOne($id);
        $modelUtilizador = Utilizador::findOne($id);
        $modelUser = User::findOne($modelUtilizador->id_user);
        $modelUtilizador->username = $modelUser->username;
        $modelUtilizador->email = $modelUser->email;

        $auth = Yii::$app->authManager;
        $userRole = Yii::$app->db ->createCommand("Select * from auth_assignment where user_id='".$modelUtilizador->id_user."'")->queryOne();
        $prerole = $userRole['item_name'];
        $roles = [];
        foreach ($auth->getroles() as $role){
            if($role->name != 'cliente' && $role->name != 'admin')
                array_push($roles, [$role->name => $role->name] );
        }

        if ($modelFuncionario->load(Yii::$app->request->post()) && $modelUtilizador->load(Yii::$app->request->post())) {
            $modelUser->username = $modelUtilizador->username;
            $modelUser->email = $modelUtilizador->email;
            $modelUser->save();

            $auth = \Yii::$app->authManager;
            $auth->revokeAll($modelUtilizador->id_user);
            $userRole = $auth->getRole($modelUtilizador->role);
            $auth->assign($userRole, $modelUser->getId());
            $modelUtilizador->save(false);
            $modelFuncionario->save();

            return $this->redirect(['view', 'id' => $modelFuncionario->id]);
        }

        return $this->render('update', [
            'modelFuncionario' => $modelFuncionario,
            'modelUtilizador' => $modelUtilizador,
            'prerole' =>$prerole,
            'roles' => $roles,
        ]);
    }

    /**
     * Deletes an existing Funcionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $modelUtilizador = Utilizador::findOne($id);
        $modelUser = User::findOne($modelUtilizador->id_user);
        if($modelUser->status == 0){
            $modelUser->status = 10;
        }else{
            $modelUser->status = 0;
        }

        $modelUser->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funcionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Funcionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Funcionario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
