<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PedidoRecurso */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pedido-recurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <?= $form->field($model, 'custo_total')->textInput() ?>

    <?= $form->field($model, 'id_recurso')->textInput() ?>

    <?= $form->field($model, 'id_funcionario')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'aprovado' => 'Aprovado', 'pago' => 'Pago', 'reprovado' => 'Reprovado', 'devolvido' => 'Devolvido', 'entregue' => 'Entregue', 'por aprovar' => 'Por aprovar', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
