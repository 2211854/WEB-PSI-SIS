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

    <?= $form->field($model, 'estado')->dropDownList([ 'cancelado' => 'Cancelado', 'concluido' => 'Concluido', 'planeada' => 'Planeada', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_hangar')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Hangar::find()->asArray()->all(), 'id', 'designacao'),['prompt' => 'Selecionar se necessario']) ?>

    <?= $form->field($model, 'id_recurso')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Recurso::find()->asArray()->all(), 'id', 'nome'),['prompt' => 'Selecionar se necessario']) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
