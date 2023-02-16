<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */
/** @var \common\models\Utilizador $modelUtilizador */
/** @var \common\models\Cliente $modelCliente */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = 'Editar perfil';
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
                        <?=Html::a('Pagina inicial <span class="lnr lnr-arrow-right"></span>',['site/index'])?>
                        <?=Html::a(Html::encode($this->title),['site/profile'])?>
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
                        'class' => 'row register_form'
                    ]
                ]); ?>

                <div class="col-lg-6">
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'nome')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Nome"','class' => 'form-control','placeholder' => 'Nome','required'=> true])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'username')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Nome de Utilizador"','class' => 'form-control','placeholder' => 'Nome de Utilizador','required' => true])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'telemovel')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Telemovel"','class' => 'form-control','placeholder' => 'Telemovel','required' => true,'type' => 'number','min'=>900000000,'max'=>999999999])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelCliente, 'passaporte')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Passaport"','class' => 'form-control','placeholder' => 'Passaport', 'required' => true,'minlength'=>8,'maxlength'=>10])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelCliente, 'password')->passwordInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Palavra-Passe"','class' => 'form-control','placeholder' => 'Palavra-Passe', 'required' => true,'minlength'=>8])->label(false) ?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'apelidos')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Apelidos"','class' => 'form-control','placeholder' => 'Apelidos','required'=> true])->label(false) ?>

                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'email')->textInput(['type'=>'email','onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Email"','class' => 'form-control','placeholder' => 'Email', 'required' => true],)->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'cartaocidadao')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Cartao de Cidadaão"','class' => 'form-control','placeholder' => 'Cartão de Cidadão','required' => true,'type' => 'number','min'=>10000000,'max'=>99999999])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelUtilizador, 'nif')->textInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "NIF"','class' => 'form-control','placeholder' => 'NIF', 'required' => true,'type' => 'number','min'=>100000000,'max'=>399999999])->label(false) ?>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= $form->field($modelCliente, 'newpassword')->passwordInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Nova palavra-Passe"','class' => 'form-control','placeholder' => 'Nova palavra-Passe', 'required' => true,'minlength'=>8])->label(false) ?>

                    </div>
                </div>
                <div>
                    <div class="col-md-12 form-group justify-content-center">
                        <?= $form->field($modelCliente, 'newpassword2')->passwordInput(['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Repetir nova palavra-Passe"','class' => 'form-control','placeholder' => 'Repetir nova palavra-Passe', 'required' => true,'minlength'=>8])->label(false) ?>
                    </div>
                </div>
                <div class="col">
                    <div class="col-md-12 form-group">
                        <div class="creat_account">
                            <label for="f-option2"></label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <?= Html::submitButton('Alterar', ['class' => 'primary-btn', 'name' => 'signup-button']) ?>

                    </div>
                </div>


                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>
</div>