<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelFuncionario common\models\Funcionario */
/* @var $modelUtilizador common\models\Utilizador */
/* @var $modelUser common\models\User */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="funcionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUtilizador, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelUtilizador, 'email') ?>

    <?= $form->field($modelUtilizador, 'password')->passwordInput() ?>

    <?= $form->field($modelUtilizador, 'role')->dropDownList($roles)?>

    <?= $form->field($modelUtilizador, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUtilizador, 'apelidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelFuncionario, 'nib')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUtilizador, 'telemovel')->textInput() ?>

    <?= $form->field($modelUtilizador, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUtilizador, 'cartaocidadao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
