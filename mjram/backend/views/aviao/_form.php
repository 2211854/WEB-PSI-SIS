<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Aviao */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="aviao-form">

    <?php
    if(isset($message)){

        echo \hail812\adminlte\widgets\Alert::widget([
            'type' => 'warning',
            'body' => '<h3>'.$message.'</h3>',
        ]);
    }
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'combustivelmaximo')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'combustivelatual')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'inativo' => 'Inativo', 'operacional' => 'Operacional', 'manutencao' => 'Manutencao', 'danificado' => 'Danificado', ]) ?>

    <?= $form->field($model, 'id_companhia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Companhia::find()->asArray()->all(), 'id', 'nome')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
