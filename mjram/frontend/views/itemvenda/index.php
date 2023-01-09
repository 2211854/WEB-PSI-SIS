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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Item Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



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
                    'filterModel' => $searchModel,
                    'options' =>
                        [
                                'class' => 'table'

                        ],
                    'columns' => [
                        [
                                'class' => 'yii\grid\SerialColumn'
                        ],
                        [
                                'label' => 'Partida',
                                'attribute' => 'partida',
                                'value' => function($model) {
                                    return $model->voo->escalaVoos[0]->partida;
                                }

                        ],
                        [
                            'label' => 'Destino',
                            'attribute' => 'destino',
                            'value' => function($model) {
                                return $model->voo->escalaVoos[count($model->voo->escalaVoos)-1]->destino;
                            }

                        ],
                        'passaporte',
                        'id_classe',
                        'id_voo',
                        [
                            'class' => ActionColumn::className(),
                            'template'=>'{delete}',
                            'urlCreator' => function ($action, ItemVenda $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]);
                            }
                        ],
                    ],
                ]); ?>
                <div class="table">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">Apelido</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Partida</th>
                            <th scope="col">Nº de Escalas</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Passaporte</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- primeiro produto -->
                        <tr>
                            <td>
                                <h5>Antonio</h5>
                            </td>
                            <td>
                                <h5>Josefino</h5>
                            </td>
                            <td>
                                <p>Faro</p>
                            </td>
                            <td>
                                <h5>2</h5>
                            </td>
                            <td>
                                <p>Nice</p>
                            </td>
                            <td>
                                <h5>Economica</h5>
                            </td>
                            <td>
                                <h5>PS38123712</h5>
                            </td>
                            <td>
                                <h5>333.33€</h5>
                            </td>
                            <td class="btn-cart">
                                <a class="icon_btn" href="#"><i class="lnr lnr lnr-trash"></i></a>
                            </td>
                        </tr>
                        <!-- segundo produto -->
                        <tr>
                            <td>
                                <h5>Antonio</h5>
                            </td>
                            <td>
                                <h5>Josefino</h5>
                            </td>
                            <td>
                                <p>Faro</p>
                            </td>
                            <td>
                                <h5>2</h5>
                            </td>
                            <td>
                                <p>Nice</p>
                            </td>
                            <td>
                                <h5>Economica</h5>
                            </td>
                            <td>
                                <h5>PS38123712</h5>
                            </td>
                            <td>
                                <h5>333.33€</h5>
                            </td>
                            <td class="btn-cart">
                                <a class="icon_btn" href="#"><i class="lnr lnr lnr-trash"></i></a>
                            </td>
                        </tr>
                        <!-- terceiro produto -->
                        <tr>
                            <td>
                                <h5>Antonio</h5>
                            </td>
                            <td>
                                <h5>Josefino</h5>
                            </td>
                            <td>
                                <p>Faro</p>
                            </td>
                            <td>
                                <h5>2</h5>
                            </td>
                            <td>
                                <p>Nice</p>
                            </td>
                            <td>
                                <h5>Economica</h5>
                            </td>
                            <td>
                                <h5>PS38123712</h5>
                            </td>
                            <td>
                                <h5>333.33€</h5>
                            </td>
                            <td class="btn-cart">
                                <a class="icon_btn" href="#"><i class="lnr lnr lnr-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>$2160.00</h5>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="index.html">Continue Shopping</a>
                                    <a class="primary-btn" href="checkout.html">Proceed to checkout</a>
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
