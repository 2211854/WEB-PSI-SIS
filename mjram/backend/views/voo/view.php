<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Voo */

$this->title = $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['index']];
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
                            'estado',
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