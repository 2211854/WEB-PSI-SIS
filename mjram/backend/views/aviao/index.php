<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Aviao;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AviaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aviões';
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
                            <?= Html::a('Criar Avião', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [

                            'designacao',
                            'marca',
                            'modelo',
                            'combustivelatual',
                            [
                                'label' => 'Estado',
                                'attribute' => 'estado',
                                'filter'=>array("inativo"=>"inativo","operacional"=>"operacional","manutencao"=>"manutencao","danificado"=>"danificado"),
                                'value' => function($model) {
                                    return $model->estado;
                                }
                            ],
                            [
                                'label' => 'Companhia',
                                'attribute' => 'sigla',
                                'value' => function($model) {
                                    return $model->companhia->sigla;
                                }
                            ],
                            [
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                                'template'=>'{view} {update} {delete} {ocupacao}',
                                'buttons'=>[

                                    'ocupacao' => function ($action, $model) {

                                        return Html::a('<i class="fas fa-couch"></i>',['ocupacao/index','aviaoid'=>$model->id]);

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
