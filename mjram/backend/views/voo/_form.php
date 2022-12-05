<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Voo */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="voo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'atrasado' => 'Atrasado', 'cancelado' => 'Cancelado', 'concluido' => 'Concluido', 'planeado' => 'Planeado', 'circulacao' => 'Circulacao', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_aviao')->textInput() ?>

    <?= $form->field($model, 'id_pista')->textInput() ?>

    <?= $form->field($model, 'id_funcionario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
