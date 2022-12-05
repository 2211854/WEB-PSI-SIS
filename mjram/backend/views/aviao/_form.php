<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Aviao */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="aviao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'combustivelatual')->textInput() ?>

    <?= $form->field($model, 'combustivelmaximo')->textInput() ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'inativo' => 'Inativo', 'operacional' => 'Operacional', 'manutencao' => 'Manutencao', 'danificado' => 'Danificado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_companhia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
