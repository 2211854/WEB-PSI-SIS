<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Criar nova conta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
        <!-- Start Banner Area -->
        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <nav class="d-flex align-items-center">
                            <?=Html::a('Entrar <span class="lnr lnr-arrow-right"></span>',['site/login'])?>
                            <?=Html::a(Html::encode($this->title),['site/signup'])?>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        <!--================Register Box Area =================-->
        <section class="register_box_area section_gap">
            <div class="container">

                <div class="register_form_inner">
                    <h3><?= Html::encode($this->title) ?></h3>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup',
                        'options' => [
                                'class' => 'row register_form',
                                'novalidate'=>'novalidate'
                        ]
                         ]); ?>

                    <div class="col-lg-6">
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'nome')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Nome"','class' => 'form-control','placeholder' => 'Nome'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'username')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Nome de Utilizador"','class' => 'form-control','placeholder' => 'Nome de Utilizador'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'telemovel')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Telemovel"','class' => 'form-control','placeholder' => 'Telemovel'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'passaport')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Passaport"','class' => 'form-control','placeholder' => 'Passaport'])->label(false) ?>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'apelidos')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Apelidos"','class' => 'form-control','placeholder' => 'Apelidos'])->label(false) ?>

                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'email')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Email"','class' => 'form-control','placeholder' => 'Email'])->label(false) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'password')->passwordInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Palavra-Passe"','class' => 'form-control','placeholder' => 'Palavra-Passe'])->label(false) ?>

                        </div>
                        <div class="col-md-12 form-group">
                            <?= $form->field($model, 'cartaocidadao')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Cartao de Cidadaão"','class' => 'form-control','placeholder' => 'Cartão de Cidadão'])->label(false) ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <label for="f-option2"></label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= Html::submitButton('Registar', ['class' => 'primary-btn', 'name' => 'signup-button']) ?>

                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </section>
</div>
