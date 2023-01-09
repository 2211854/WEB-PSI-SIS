<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Aviao */

$this->title = 'Criar Avião';
$this->params['breadcrumbs'][] = ['label' => 'Aviões', 'url' => ['index']];
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