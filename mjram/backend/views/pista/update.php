<?php

/* @var $this yii\web\View */
/* @var $model common\models\Pista */

$this->title = 'Update Pista: ' . $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Pistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>