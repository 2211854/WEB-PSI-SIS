<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelFuncionario common\models\Funcionario */
/* @var $modelUtilizador common\models\Utilizador */
/* @var $modelUser common\models\User */
/* @var $form yii\bootstrap4\ActiveForm */


if (isset($message)) {

    echo \hail812\adminlte\widgets\Alert::widget([
        'type' => 'warning',
        'body' => '<h3>' . $message . '</h3>',
    ]);
}
?>

<div class="funcionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUtilizador, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelUtilizador, 'email') ?>

    <?= $form->field($modelUtilizador, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUtilizador, 'apelidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelFuncionario, 'nib')->textInput(['maxlength' => true,'type' => 'number','min'=>100000000000000000000,'max'=>999999999999999999999]) ?>

    <?= $form->field($modelUtilizador, 'telemovel')->textInput(['maxlength' => true, 'type' => 'number','min'=>900000000,'max'=>999999999]) ?>

    <?= $form->field($modelUtilizador, 'nif')->textInput(['maxlength' => true,'type' => 'number','min'=>100000000,'max'=>399999999]) ?>

    <?= $form->field($modelUtilizador, 'cartaocidadao')->textInput(['type' => 'number','min'=>10000000,'max'=>99999999]) ?>

    <?= $form->field($modelFuncionario, 'password')->textInput(['minlength'=>8,'required' => true]) ?>

    <?= $form->field($modelFuncionario, 'newpassword')->textInput(['minlength'=>8,'required' => true]) ?>

    <?= $form->field($modelFuncionario, 'newpassword2')->textInput(['minlength'=>8,'required' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
