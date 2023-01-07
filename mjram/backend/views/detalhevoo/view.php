<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DetalheVoo */

$this->title = $model->voo->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Detalhe Voos', 'url' => ['index','vooid'=>$model->id_voo]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id_voo' => $model->id_voo, 'id_classe' => $model->id_classe], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id_voo' => $model->id_voo, 'id_classe' => $model->id_classe], [
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
                            [
                                'label' => 'Preço',
                                'attribute' => 'preço',
                                'value' => function($model) {
                                    return $model->preço.'€';
                                }
                            ],
                            [
                                'label' => 'Classe',
                                'attribute' => 'classed',
                                'value' => function($model) {
                                    return $model->classe->designacao;
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