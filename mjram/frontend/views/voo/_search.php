<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VooSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="voo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_registo') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'id_aviao') ?>

    <?= $form->field($model, 'id_pista') ?>

    <?php // echo $form->field($model, 'id_funcionario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
