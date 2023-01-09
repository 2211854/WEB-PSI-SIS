<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pista */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comprimento')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'largura')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'danificada' => 'Danificada', 'operacional' => 'Operacional', 'manutencao' => 'Manutencao', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
