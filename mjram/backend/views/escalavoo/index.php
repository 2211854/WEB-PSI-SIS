<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EscalavooSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escalas do Voo: '.$voo->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['voo/index']];
$this->params['breadcrumbs'][] = $this->title;
if(isset($message)){

    echo \hail812\adminlte\widgets\Alert::widget([
        'type' => 'warning',
        'body' => '<h3>'.$message.'</h3>',
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
                            <?= Html::a('Create Escala Voo', ['create','vooid'=>$voo->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'partida',
                            'destino',
                            'horario_partida',
                            'horario_chegada',
                            //'id_voo',

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
