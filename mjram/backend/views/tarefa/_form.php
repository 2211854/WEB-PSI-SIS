<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tarefa */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="tarefa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_conclusao')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'cancelado' => 'Cancelado', 'concluido' => 'Concluido', 'planeada' => 'Planeada', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_voo')->textInput() ?>

    <?= $form->field($model, 'id_hangar')->textInput() ?>

    <?= $form->field($model, 'id_recurso')->textInput() ?>

    <?= $form->field($model, 'id_funcionario_registo')->textInput() ?>

    <?= $form->field($model, 'id_funcionario_responsavel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
