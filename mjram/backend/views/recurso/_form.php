<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recurso */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stockatual')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CategoriaRecurso::find()->asArray()->all(), 'id', 'designacao')) ?>

    <?= $form->field($model, 'id_unidade')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\UnidadeMedida::find()->asArray()->all(), 'id', 'designacao')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
