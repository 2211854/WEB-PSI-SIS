<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pistas';
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
                            <?= Html::a('Criar Pista', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [

                            'designacao',
                            'comprimento',
                            'largura',
                            [
                                'label' => 'Estado',
                                'attribute' => 'estado',
                                'filter'=>array("danificada"=>"danificada","operacional"=>"operacional","manutencao"=>"manutencao"),
                                'value' => function($model) {
                                    return $model->estado;
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
