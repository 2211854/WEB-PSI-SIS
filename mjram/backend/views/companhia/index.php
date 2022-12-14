<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanhiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companhias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Companhia', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php
                        if(isset($actionStatus)&& isset($name)){

                            $mensagem = $actionStatus == 'success' ? "Companhia $name  eliminada com sucesso!" : "Não foi possivel eliminar a companhia $name!";

                            echo \hail812\adminlte\widgets\Alert::widget([
                                'type' => $actionStatus,
                                'body' => '<h3>'.$mensagem.'</h3>',
                            ]);
                        }
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'nome',
                            'sigla',

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
