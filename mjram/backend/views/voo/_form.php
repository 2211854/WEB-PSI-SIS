<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Voo */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="voo-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_aviao')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Aviao::find()->where(['estado'=>'operacional'])->asArray()->all(), 'id', 'designacao')) ?>

    <?= $form->field($model, 'id_pista')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Pista::find()->where(['estado'=>'operacional'])->asArray()->all(), 'id', 'designacao')) ?>
    <?php if($this->title != 'Criar Voo'){
            if($model->estado == 'planeado'){
    ?>
            <?= $form->field($model, 'estado')->dropDownList(['atrasado' => 'Atrasado', 'cancelado' => 'Cancelado', 'concluido' => 'Concluido', 'planeado' => 'Planeado', 'circulacao' => 'Circulacao']) ?>
    <?php }elseif($model->estado == 'cancelado'){
            ?>
            <?= $form->field($model, 'estado')->dropDownList(['cancelado' => 'Cancelado']) ?>
        <?php }elseif($model->estado == 'concluido'){
            ?>
            <?= $form->field($model, 'estado')->dropDownList(['concluido' => 'Concluido']) ?>
        <?php }elseif($model->estado == 'circulacao'){
            ?>
            <?= $form->field($model, 'estado')->dropDownList(['concluido' => 'Concluido','circulacao' => 'Circulacao']) ?>
        <?php }else{
            ?>
                <?= $form->field($model, 'estado')->dropDownList(['atrasado' => 'Atrasado', 'cancelado' => 'Cancelado', 'concluido' => 'Concluido','circulacao' => 'Circulacao']) ?>
        <?php }
    }
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
