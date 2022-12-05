<?php

/* @var $this yii\web\View */
/* @var $model common\models\ItemVenda */

$this->title = 'Update Item Venda: ' . $model->passaporte;
$this->params['breadcrumbs'][] = ['label' => 'Item Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->passaporte, 'url' => ['view', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]];
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