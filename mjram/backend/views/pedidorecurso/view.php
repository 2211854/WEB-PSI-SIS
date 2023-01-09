<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PedidoRecurso */

$this->title = 'Pedido recurso: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            [
                                'label' => 'Quantidade',
                                'attribute' => 'quantidade',
                                'value' => function($model) {
                                    return $model->quantidade .' '. $model->recurso->unidade->designacao;
                                }
                            ],
                            'data_registo',
                            [
                                'label' => 'Custo Total',
                                'attribute' => 'custo_total',
                                'value' => function($model) {
                                    return $model->custo_total . ' €';
                                }
                            ],
                            [
                                'label' => 'Recurso',
                                'attribute' => 'recurso',
                                'value' => function($model) {
                                    return $model->recurso->nome;
                                }
                            ],
                            [
                                'label' => 'Funcionario',
                                'attribute' => 'funcionario',
                                'value' => function($model) {
                                    return $model->funcionario->utilizador->nome;
                                }
                            ],
                            'estado',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>