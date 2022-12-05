<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Utilizador */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="utilizador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'telemovel')->textInput() ?>

    <?= $form->field($model, 'palavrapasse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apelidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cartaocidadao')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
