<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ItemVenda $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="item-venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'passaporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_venda')->textInput() ?>

    <?= $form->field($model, 'id_classe')->textInput() ?>

    <?= $form->field($model, 'id_voo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
