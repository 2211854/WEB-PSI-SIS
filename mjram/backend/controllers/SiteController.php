<?php

namespace backend\controllers;

use common\models\Aviao;
use common\models\EscalaVoo;
use common\models\Funcionario;
use common\models\LoginForm;
use backend\models\SignupForm;
use common\models\Pista;
use common\models\Recurso;
use common\models\Voo;
use DateTime;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\BaseUrl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $voosHoje = 0;
        $totalVoos = 0;
        $totalFuncionarios = 0;
        $avioesInoperacionaisComVoos = 0;
        $pistasInoperacionais = 0;
        $avioesDanificados = 0;
        $avioesManutencao = 0;
        $voosPlaneados = 0;
        $voosCirculacao = 0;
        $voosAtrasados = 0;
        $poucosRecursos = 0;

        $listaVoos = Voo::find()->all();
        foreach ($listaVoos as $voo) {
            $totalVoos = $totalVoos + 1;
            if($voo['estado'] == "planeado"){
                $voosPlaneados = $voosPlaneados + 1;
            }elseif($voo['estado'] == "atrasado"){
                $voosAtrasados = $voosAtrasados + 1;
            }elseif($voo['estado'] == "circulacao"){
                $voosCirculacao = $voosCirculacao + 1;
            }

            $escalaVoo = EscalaVoo::find()->where(['id_voo' => $voo['id']])->one();
            $datetime1 = new DateTime($escalaVoo['horario_partida']); // 11 October 2013
            $datetime2 = new DateTime('now'); // 13 October 2013
            if($datetime1->format('d') == $datetime2->format('d')){
                $voosHoje = $voosHoje + 1;
            }

        }

        $listaAvioes = Aviao::find()->all();
        foreach ($listaAvioes as $aviao) {
            if($aviao['estado'] == "danificado"){
                $avioesDanificados = $avioesDanificados + 1;
            }elseif($aviao['estado'] == "manutencao"){
                $avioesManutencao = $avioesManutencao + 1;
            }
            if($aviao['estado'] != "operacional"){
                foreach ($listaVoos as $voo) {
                    if($aviao['id'] == $voo['id_aviao']){
                        $escalaVoo = EscalaVoo::find()->where(['id_voo' => $voo['id']])->one();
                        $datetime1 = new DateTime($escalaVoo['horario_partida']);
                        $datetime2 = new DateTime('now');
                        if($datetime1->format('d') >= $datetime2->format('d')){
                            $avioesInoperacionaisComVoos = $avioesInoperacionaisComVoos + 1;
                        }
                    }
                }
            }

        }

        $listafuncionarios = Funcionario::find()->all();
        $totalFuncionarios = count($listafuncionarios);

        $listapistas = Pista::find()->all();
        foreach ($listapistas as $pista) {
            if($pista['estado'] != "operacional"){
                $pistasInoperacionais = $pistasInoperacionais + 1;
            }
        }

        $listarecursos = Recurso::find()->all();
        foreach ($listarecursos as $recurso) {
            if($recurso['stockatual'] < 100){
                $poucosRecursos = $poucosRecursos + 1;
            }
        }
        return $this->render('index',[
            'voosHoje' => $voosHoje,
            'totalVoos' => $totalVoos,
            'totalFuncionarios' => $totalFuncionarios,
            'avioesInoperacionaisComVoos' => $avioesInoperacionaisComVoos,
            'pistasInoperacionais' => $pistasInoperacionais,
            'avioesDanificados' => $avioesDanificados,
            'avioesManutencao' => $avioesManutencao,
            'voosPlaneados' => $voosPlaneados,
            'voosCirculacao' => $voosCirculacao,
            'voosAtrasados' => $voosAtrasados,
            'poucosRecursos' => $poucosRecursos
        ]);
    }


    /**
     * Displays Signup
     * @return string
     */
    public function actionSignup()
    {

        $auth = Yii::$app->authManager;
        $roles = [];
        foreach ($auth->getroles() as $role){
            if($role->name != 'cliente' && $role->name != 'admin')
                array_push($roles, [$role->name => $role->name] );
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
            'roles' => $roles,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $isLoggedIn = $model->login('back');
            if($isLoggedIn === 'tofront'){
                return $this->redirect(Yii::$app->urlManager->getBaseUrl() . "/../../frontend/web/site/login");
            }
            else{
                return $this->goBack();
            }

        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
