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

    <?= $form->field($modelUtilizador, 'role')->dropDownList($roles,array('options' => array($prerole=>array('selected'=>true))))?>

    <?= $form->field($modelUtilizador, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUtilizador, 'apelidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelFuncionario, 'nib')->textInput(['maxlength' => true,'type' => 'number','min'=>100000000000000000000,'max'=>999999999999999999999]) ?>

    <?= $form->field($modelUtilizador, 'telemovel')->textInput(['maxlength' => true, 'type' => 'number','min'=>900000000,'max'=>999999999]) ?>

    <?= $form->field($modelUtilizador, 'nif')->textInput(['maxlength' => true,'type' => 'number','min'=>100000000,'max'=>399999999]) ?>

    <?= $form->field($modelUtilizador, 'cartaocidadao')->textInput(['type' => 'number','min'=>10000000,'max'=>99999999]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>