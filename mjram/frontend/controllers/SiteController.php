<?php

namespace frontend\controllers;

use common\models\Cliente;
use common\models\Utilizador;
use common\models\User;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['siteIndexFO','?'],
                    ],
                    [
                        'actions' => ['logout','profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['loginFO','?'],
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
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->can('loginFO')){
                Yii::$app->session->setFlash('success','Entraste na tua área reservada');
                return $this->goBack();
            }else{
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('danger','Nao pode efetuar login no frontend');
                return $this->goHome();
            }

        }else if($model->load(Yii::$app->request->post())){
            Yii::$app->session->setFlash('danger','Não foi possivel efetuar o login');
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        }
//
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $auth = Yii::$app->authManager;
        $modelCliente = new Cliente();
        $modelUtilizador = new Utilizador();
        $modelUser = new User();
        if ($modelCliente->load(Yii::$app->request->post()) && $modelUtilizador->load(Yii::$app->request->post())) {
            try {
                $modelUser->username = $modelUtilizador->username;
                $modelUser->email = $modelUtilizador->email;
                $modelUser->setPassword($modelUtilizador->password);
                $modelUser->generateAuthKey();
                $modelUser->generateEmailVerificationToken();

                $modelUser->status = 10;
                $modelUser->save();
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole('cliente');
                $auth->assign($userRole, $modelUser->getId());

                $modelUtilizador->id_user = $modelUser->getId();
                $modelUtilizador->save(false);
                $modelCliente->id = $modelUtilizador->id;
                $modelCliente->save(false);

                Yii::$app->session->setFlash('success','Foste registado com sucesso, faz login');
                return $this->redirect(['site/login']);

            } catch ( Exception $e) {
                Yii::$app->session->setFlash('danger',$e->getMessage());
                throw new BadRequestHttpException($e->getMessage());
            }
        }

        return $this->render('signup', [
            'modelCliente' => $modelCliente,
            'modelUtilizador' => $modelUtilizador,
        ]);
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionProfile()
    {
        $modelUser = User::findOne(Yii::$app->user->getId());
        $modelUtilizador = Utilizador::find()->where(['id_user' => $modelUser->id])->one();
        $modelCliente = Cliente::findOne($modelUtilizador->id);
        $modelUtilizador->username = $modelUser->username;
        $modelUtilizador->email = $modelUser->email;


        if ($modelCliente->load(Yii::$app->request->post()) && $modelUtilizador->load(Yii::$app->request->post())) {
            if(!$modelUser->validatePassword($modelCliente->password)){
                Yii::$app->session->setFlash('danger','A password nao esta correta!');
                return $this->render('profile', [
                    'modelCliente' => $modelCliente,
                    'modelUtilizador' => $modelUtilizador,
                ]);
            }else {
                if ($modelCliente->newpassword == $modelCliente->newpassword2) {
                    $modelUser->username = $modelUtilizador->username;
                    $modelUser->email = $modelUtilizador->email;
                    $modelUtilizador->save(false);
                    $modelCliente->save();
                    $modelUser->setPassword($modelCliente->newpassword);
                    $modelUser->save();
                }else{
                    Yii::$app->session->setFlash('danger','A nova password nao corresponde!');
                    return $this->render('profile', [
                        'modelCliente' => $modelCliente,
                        'modelUtilizador' => $modelUtilizador,
                    ]);
                }
                Yii::$app->session->setFlash('success','Perfil alterado!');
                return $this->redirect(['site/index']);
            }
        }
        return $this->render('profile', [
            'modelCliente' => $modelCliente,
            'modelUtilizador' => $modelUtilizador,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
//    public function actionRequestPasswordReset()
//    {
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            }
//
//            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
//    public function actionResetPassword($token)
//    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidArgumentException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
//    public function actionVerifyEmail($token)
//    {
//        try {
//            $model = new VerifyEmailForm($token);
//        } catch (InvalidArgumentException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
//            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
//            return $this->goHome();
//        }
//
//        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
//        return $this->goHome();
//    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
//    public function actionResendVerificationEmail()
//    {
//        $model = new ResendVerificationEmailForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//                return $this->goHome();
//            }
//            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
//        }
//
//        return $this->render('resendVerificationEmail', [
//            'model' => $model
//        ]);
//    }
}
