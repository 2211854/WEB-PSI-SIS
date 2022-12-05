<?php

/* @var $this yii\web\View */
/* @var $model common\models\DetalheVoo */

$this->title = 'Update Detalhe Voo: ' . $model->id_voo;
$this->params['breadcrumbs'][] = ['label' => 'Detalhe Voos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_voo, 'url' => ['view', 'id_voo' => $model->id_voo, 'id_classe' => $model->id_classe]];
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