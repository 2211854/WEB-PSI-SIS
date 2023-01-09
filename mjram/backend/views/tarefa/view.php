<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tarefa */

$this->title = $model->voo->designacao. '- Tarefa: '. $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Tarefas', 'url' => ['index','vooid'=>$model->id_voo]];
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
                            'designacao',
                            'data_registo',
                            'data_inicio',
                            'data_conclusao',
                            'estado',
                            [
                                'label' => 'Voo',
                                'attribute' => 'vood',
                                'value' => function($model) {
                                    return $model->voo->designacao;
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