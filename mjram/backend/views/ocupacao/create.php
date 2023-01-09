<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ocupacao */

$this->title = 'Criar Ocupacao';
$this->params['breadcrumbs'][] = ['label' => 'Ocupacoes', 'url' => ['index','aviaoid' => $model->id_aviao]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model,
                        'message' => $message,
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>