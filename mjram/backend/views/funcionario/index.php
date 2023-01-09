<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Funcionario', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'label' => 'Username',
                                'attribute' => 'username',
                                'value' => function($model) {
                                    return $model->utilizador->user->username;
                                }
                            ],
                            [
                                'label' => 'Email',
                                'attribute' => 'email',
                                'value' => function($model) {
                                    return $model->utilizador->user->email;
                                }
                            ],
                            [
                                'label' => 'Role',
                                'attribute' => 'role',
                                'filter'=>array("gestorFinaceiro"=>"gestorFinaceiro","gestorLogistica"=>"gestorLogistica"),
                                'value' => function($model) {
                                    $userRole = Yii::$app->db ->createCommand("Select * from auth_assignment where user_id='".$model->utilizador->id_user."'")->queryOne();
                                    $prerole = $userRole['item_name'];
                                    return $prerole;
                                }
                            ],
                            [
                                'label' => 'Nome',
                                'attribute' => 'nome',
                                'value' => function($model) {
                                    return $model->utilizador->nome;
                                }
                            ],
                            [
                                'label' => 'Apelido',
                                'attribute' => 'apelidos',
                                'value' => function($model) {
                                    return $model->utilizador->apelidos;
                                }
                            ],
                            'nib',
                            [
                                'label' => 'Telemovel',
                                'attribute' => 'telemovel',
                                'value' => function($model) {
                                    return $model->utilizador->telemovel;
                                }
                            ],
                            [
                                'label' => 'Nif',
                                'attribute' => 'nif',
                                'value' => function($model) {
                                    return $model->utilizador->nif;
                                }
                            ],
                            [
                                'label' => 'Cartao Cidadao',
                                'attribute' => 'cartaocidadao',
                                'value' => function($model) {
                                    return $model->utilizador->cartaocidadao;
                                }
                            ],

                            [
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                                'template'=>'{view} {update} {delete}',
                                'buttons'=>[

                                    'delete' => function ($action, $model) {
                                            if($model->utilizador->user->status == 0){
                                                return Html::a('<i class="fas fa-check"></i>',['funcionario/delete','id'=>$model->id],[ 'data-method'=>'POST']);
                                            }else{
                                                return Html::a('<i class="fas fa-trash"></i>',['funcionario/delete','id'=>$model->id],['data-method'=>'POST']);
                                            }
                                    },

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
