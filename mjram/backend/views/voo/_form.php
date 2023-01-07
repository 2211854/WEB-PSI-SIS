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

    <?= $form->field($model, 'id_aviao')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Aviao::find()->asArray()->all(), 'id', 'designacao')) ?>

    <?= $form->field($model, 'id_pista')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Pista::find()->asArray()->all(), 'id', 'designacao')) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
