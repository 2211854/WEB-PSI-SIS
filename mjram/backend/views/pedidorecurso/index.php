<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidorecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Recursos';
$this->params['breadcrumbs'][] = $this->title;

if (isset($message)) {

    echo \hail812\adminlte\widgets\Alert::widget([
        'type' => 'warning',
        'body' => '<h3>' . $message . '</h3>',
    ]);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Pedido Recurso', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [

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
                                'attribute' => 'recursod',
                                'value' => function($model) {
                                    return $model->recurso->nome;
                                }
                            ],
                            [
                                'label' => 'Funcionario',
                                'attribute' => 'funcionariod',
                                'value' => function($model) {
                                    return $model->funcionario->utilizador->nome;
                                }
                            ],
                            [
                                'label' => 'Estado',
                                'attribute' => 'estado',
                                'filter'=>array("aprovado"=>"aprovado","pago"=>"pago","reprovado"=>"reprovado","devolvido"=>"devolvido","entregue"=>"entregue","por aprovar"=>"por aprovar"),
                                'value' => function($model) {
                                    return $model->estado;
                                }
                            ],
                            [
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                                'template'=>'{view} {update}',
                                ],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
