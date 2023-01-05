<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalhevooSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalhes do voo: '.$voo->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['voo/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Detalhe Voo', ['create','vooid'=>$voo->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
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
