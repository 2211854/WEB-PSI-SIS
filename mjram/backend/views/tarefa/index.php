<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TarefaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarefas do voo: '.$voo->designacao;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Tarefa', ['create','vooid'=>$voo->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'designacao',
                            'data_registo',
                            'data_inicio',
                            'data_conclusao',
                            [
                                'label' => 'Estado',
                                'attribute' => 'estado',
                                'value' => function($model) {
                                    return $model->estado;
                                }
                            ],
                            [
                                'label' => 'Hangar',
                                'attribute' => 'hangard',
                                'value' => function($model) {
                                    if(!isset($model->hangar)){
                                        return '';
                                    }else{
                                        return $model->hangar->designacao;
                                    }
                                }
                            ],
                            [
                                'label' => 'Recurso',
                                'attribute' => 'recursod',
                                'value' => function($model) {
                                    if(!isset($model->recurso)){
                                        return '';
                                    }else{
                                        return $model->recurso->nome;
                                    }
                                }
                            ],
                            [
                                'label' => 'Quantidade',
                                'attribute' => 'quantidaded',
                                'value' => function($model) {
                                    if(!isset($model->quantidade)){
                                        return '';
                                    }else{
                                        return $model->quantidade . ' ' . $model->recurso->unidade->designacao;
                                    }

                                }
                            ],
                            [
                                'label' => 'Func. Registo',
                                'attribute' => 'funcionario_registod',
                                'value' => function($model) {
                                    return $model->funcionarioRegisto->utilizador->nome;
                                }
                            ],
                            [
                                'label' => 'Func. Responsavel',
                                'attribute' => 'funcionario_responsaveld',
                                'value' => function($model) {
                                    if(!isset($model->funcionarioResponsavel)){
                                        return '';
                                    }else{
                                        return $model->funcionarioResponsavel->utilizador->nome;
                                    }
                                }
                            ],

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
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
