<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Venda $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'cancelado' => 'Cancelado', 'pago' => 'Pago', 'carrinho' => 'Carrinho', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'data_compra')->textInput() ?>

    <?= $form->field($model, 'data_registo')->textInput() ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
