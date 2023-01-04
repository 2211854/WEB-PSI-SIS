<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1><?= Html::encode($this->title) ?></h1>
               <!-- <nav class="d-flex align-items-center">
                    <?= Html::a('Inicio <span class="lnr lnr-arrow-right"></span>',['site/index'],['class' => 'lnr lnr-arrow-right'])?>

                </nav>-->
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">

                    <?= Html::img('@web/img/login.png', ['width'=>'60','class'=> 'img-fluid']);?>
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>

                        <?= Html::a('Criar uma conta',['site/signup'],['class' => 'primary-btn']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Autêntica-te para entrares </h3>

                    <?php $form = ActiveForm::begin([
                                'id' => 'login-form' ,
                                'options' => ['class' => 'row login_form']
                            ]); ?>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Username"','class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'password')->passwordInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Password"','class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?=$form->field(
                                    $model,
                                    'rememberMe',
                                [
                                        'options' => [
                                            'class' => 'creat_account',
                                        ],
                                ]
                            )->checkBox([
                                    'id'=>'f-option2'
                            ])->label(
                                    'Deixar-me logado',
                                    [
                                            'for'=> 'f-option2'
                                    ]
                            )

                            ?>

                        </div>

                        <div class="col-md-12 form-group">
                            <?= Html::submitButton('Login', ['class' => 'primary-btn', 'name' => 'login-button']) ?>
                            <?= Html::a('Forgot password?', ['site/request-password-reset']) ?>
                            <?= Html::a('Re-enviar email de verificação', ['site/resend-verification-email']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
<!--
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="my-1 mx-0" style="color:#999;">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>-->
