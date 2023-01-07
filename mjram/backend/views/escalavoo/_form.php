<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EscalaVoo */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="escala-voo-form">
    <?php
    if(isset($actionStatus)){

        echo \hail812\adminlte\widgets\Alert::widget([
            'type' => $actionStatus,
            'body' => '<h3>'.$message.'</h3>',
        ]);
    }
    ?>

    <?php $form = ActiveForm::begin();

    if(isset($model->partida) && $first==false){

    ?>

    <?= $form->field($model, 'partida')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <?php }else{?>

    <?= $form->field($model, 'partida')->textInput(['maxlength' => true]) ?>

    <?php } ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?php
    if(isset($minimo)){

    ?>

        <?= $form->field($model, 'horario_partida')->textInput(['type' => 'datetime-local','min'=>$minimo]) ?>

        <?= $form->field($model, 'horario_chegada')->textInput(['type' => 'datetime-local','min'=>$minimo]) ?>


    <?php }else{?>

        <?= $form->field($model, 'horario_partida')->textInput(['type' => 'datetime-local','min'=>date("Y-m-d H:i", strtotime("+1 day"))]) ?>

        <?= $form->field($model, 'horario_chegada')->textInput(['type' => 'datetime-local','min'=>date("Y-m-d H:i", strtotime("+1 day"))]) ?>


    <?php } ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
