<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EscalaVoo */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="escala-voo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_partida')->textInput() ?>

    <?= $form->field($model, 'horario_chegada')->textInput() ?>

    <?= $form->field($model, 'id_voo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
