<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PedidoRecurso */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="pedido-recurso-form">

    <?php $form = ActiveForm::begin();
    if($model->estado != 'por aprovar'){
    ?>
        <?= $form->field($model, 'quantidade')->textInput(['disabled'=>true,'type' => 'number']) ?>

        <?= $form->field($model, 'custo_total')->textInput(['disabled'=>true,'type' => 'number']) ?>
<?php }else{
        ?>
        <?= $form->field($model, 'quantidade')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'custo_total')->textInput(['type' => 'number']) ?>
        <?php
    } ?>

    <?php if(!isset($model->id_recurso)){ ?>
    <?= $form->field($model, 'id_recurso')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Recurso::find()->asArray()->all(), 'id', 'nome')) ?>
    <?php }else{?>
    <?= $form->field($model, 'id_recurso')->textInput(['disabled'=>true,'value'=>$model->recurso->nome]) ?>
    <?php }?>

    <?php if($this->title != 'Create Pedido Recurso'){
                if($model->estado == 'entregue'){
                    ?>
    <?= $form->field($model, 'estado')->dropDownList(['entregue' => 'Entregue', 'devolvido' => 'Devolvido']) ?>
                    <?php
                }elseif ($model->estado == 'devolvido'){
                    ?>
                    <?= $form->field($model, 'estado')->dropDownList(['devolvido' => 'Devolvido',]) ?>
                    <?php
                }elseif ($model->estado != 'por aprovar'){
                    ?>
                    <?= $form->field($model, 'estado')->dropDownList([ 'aprovado' => 'Aprovado', 'pago' => 'Pago', 'reprovado' => 'Reprovado', 'devolvido' => 'Devolvido', 'entregue' => 'Entregue']) ?>
                    <?php
                }else{?>
                    <?= $form->field($model, 'estado')->dropDownList([ 'aprovado' => 'Aprovado', 'pago' => 'Pago', 'reprovado' => 'Reprovado', 'devolvido' => 'Devolvido', 'entregue' => 'Entregue', 'por aprovar' => 'Por aprovar', ]) ?>
                <?php }
    }?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
