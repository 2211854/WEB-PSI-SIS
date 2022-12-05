<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */
/** @var yii\widgets\ActiveForm $form */
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
