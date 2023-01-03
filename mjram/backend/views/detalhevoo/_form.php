<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetalheVoo */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="detalhe-voo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'preço')->textInput() ?>

    <?= $form->field($model, 'id_voo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Voo::find()->asArray()->all(), 'id', 'designacao')) ?>

    <?= $form->field($model, 'id_classe')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Classe::find()->asArray()->all(), 'id', 'designacao')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
