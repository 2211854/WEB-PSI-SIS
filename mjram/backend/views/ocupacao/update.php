<?php

/* @var $this yii\web\View */
/* @var $model common\models\ocupacao */

$this->title = 'Update Ocupacao: ' . $model->id_aviao;
$this->params['breadcrumbs'][] = ['label' => 'Ocupacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_aviao, 'url' => ['view', 'id_aviao' => $model->id_aviao, 'id_classe' => $model->id_classe]];
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