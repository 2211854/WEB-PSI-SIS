<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VooSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Voos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Voo', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'designacao',
                            'data_registo',
                            [
                                'label' => 'Estado',
                                'attribute' => 'estado',
                                'filter'=>array('atrasado' => 'Atrasado', 'cancelado' => 'Cancelado', 'concluido' => 'Concluido', 'planeado' => 'Planeado', 'circulacao' => 'Circulacao'),
                                'value' => function($model) {
                                    return $model->estado;
                                }
                            ],
                            [
                                'label' => 'Aviao',
                                'attribute' => 'aviaod',
                                'value' => function($model) {
                                    return $model->aviao->designacao;
                                }
                            ],
                            [
                                'label' => 'Pista',
                                'attribute' => 'pistad',
                                'value' => function($model) {
                                    return $model->pista->designacao;
                                }
                            ],[
                                'label' => 'Funcionario',
                                'attribute' => 'funcionariod',
                                'value' => function($model) {
                                    return $model->funcionario->utilizador->nome;
                                }
                            ],

                            [
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                                'template'=>'{view} {update} {detalhevoo} {escalavoo} {tarefa}',
                                'buttons'=>[

                                    'detalhevoo' => function ($action, $model) {

                                        return Html::a('<i class="fas fa-euro-sign"></i>',['detalhevoo/index','vooid'=>$model->id]);

                                    },
                                    'escalavoo' => function ($action, $model) {

                                        return Html::a('<i class="fas fa-map-pin"></i>',['escalavoo/index','vooid'=>$model->id]);

                                    },

                                    'tarefa' => function ($action, $model) {

                                        return Html::a('<i class="fas fa-tasks"></i>',['tarefa/index','vooid'=>$model->id]);

                                    }

                                ],
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
