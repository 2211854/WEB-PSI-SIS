<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ocupacao */
/* @var $form yii\bootstrap4\ActiveForm */

if (isset($message)) {

    echo \hail812\adminlte\widgets\Alert::widget([
        'type' => 'warning',
        'body' => '<h3>' . $message . '</h3>',
    ]);
}
?>

<div class="ocupacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ocupacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_classe')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Classe::find()->asArray()->all(), 'id', 'designacao')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
