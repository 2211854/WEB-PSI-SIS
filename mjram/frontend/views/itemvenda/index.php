<?php

use common\models\ItemVenda;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemvendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Item Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-venda-index">

    <title><?= Html::encode($this->title) ?></title>



    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summaryOptions' => ['hidden' =>true],
                    'tableOptions' => [
                        'class' => 'table',
                    ],
                    'options' =>
                        [
                                'class' => 'table text-center',


                        ],
                    'columns' => [
                        [
                                'class' => 'yii\grid\SerialColumn',
                        ],
                        [
                                'label' => 'Partida',
                                'attribute' => 'partida',
                                'value' => function($model) {
                                    return $model->voo->escalaVoos[0]->partida;
                                },

                        ],
                        [
                            'label' => 'Horário Partida',
                            'attribute' => 'horariopartida',
                            'value' => function($model) {
                                return (new DateTime($model->voo->escalaVoos[0]->horario_partida))->format('Y-m-d H:i');
                            }

                        ],
                        [
                            'label' => 'Destino',
                            'attribute' => 'destino',
                            'value' => function($model) {
                                return $model->voo->escalaVoos[count($model->voo->escalaVoos)-1]->destino;
                            }

                        ],
                        [
                            'label' => 'Numero escalas',
                            'attribute' => 'escalas',
                            'value' => function($model) {
                                return count($model->voo->escalaVoos) ? count($model->voo->escalaVoos) : 'direto' ;
                            }

                        ],
                        [
                                'label' => 'Passaporte',
                            'attribute' => 'passaport',
                            'value' => function($model) {
                                return $model->passaporte ;
                            },
                            'contentOptions' => ['class'=>'fw-bold'],

                        ],
                        [
                            'label' => 'Classe',
                            'attribute' => 'classe',
                            'value' => function($model) {
                                return $model->classe->designacao ;
                            },
                            'contentOptions' => ['class'=>'fw-bold'],

                        ],
                        [
                            'label' => 'Voo',
                            'attribute' => 'voo',
                            'value' => function($model) {
                                return $model->voo->designacao ;
                            }

                        ],
                        [
                            'label' => 'Preco',
                            'attribute' => 'Preco',
                            'value' => function($model) {
                                 $classeid =  $model->classe->id;
                                 $detalhesvoo = $model->voo->detalheVoos;
                                 foreach( $detalhesvoo as $detalhe)
                                     {
                                         if($detalhe->id_classe == $classeid){
                                             return $detalhe->preço.'€';
                                         }
                                     }
                            },
                            'contentOptions' => ['class'=>'fw-bold'],

                        ],
                        [
                            'class' => ActionColumn::className(),
                            'template'=>'{delete}',
                            'buttons'=>[

                                'delete' => function ($action, $model) {

                                    return Html::a('<i class="lnr lnr lnr-trash"></i>',['itemvenda/delete','id'=>$model->id],['class'=>'icon_btn','data-method'=>'post']);

                                }

                            ],
                            'contentOptions' => ['class'=>'btn-cart'],

                        ],
                    ],
                ]); ?>
                <div class="table">
                    <table class="table">
                        <!-- primeiro produto -->
                        <tr>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>
                                    <?=$subtotal?>€</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td colspan="">
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <?=Html::a('Continuar a comprar',['site/index'],['class'=> 'gray_btn'])?>
                                    <?=Html::a('Efetuar pagamento',['venda/update'],['class'=> 'primary-btn'])?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
</div>
