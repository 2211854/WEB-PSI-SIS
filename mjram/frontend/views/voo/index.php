<?php

use common\models\Voo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VooSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Voos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Voo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data_registo',
            'estado',
            'id_aviao',
            'id_pista',
            //'id_funcionario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Voo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Voos | Lisboa - Faro</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Filtro 1</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Sub Filtro 1<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Sub Filtro 2<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Sub Filtro 3<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Sub Filtro 4<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Sub Filtro 5<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Filtro 2</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Sub Filtro 1<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Sub Filtro 2<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Sub Filtro 3<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Sub Filtro 4<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Sub Filtro 5<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="table">
                        <div class="oferta row text-center">
                            <div class="col">
                                <h4>Partida</h4>
                            </div>
                            <div class="col">
                                <h4>Destino</h4>
                            </div>
                            <div class="col">
                                <h4>Escalas</h4>
                            </div>
                            <div class="col">
                                <h4>Tempo total<br>de viagem</h4>
                            </div>
                            <div class="col">
                                <h4>Preço</h4>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="oferta row text-center">
                            <div class="col">
                                7:10
                            </div>
                            <div class="col">
                                10:40
                            </div>
                            <div class="col">
                                direto
                            </div>
                            <div class="col">
                                2h 30m
                            </div>
                            <div class="col">
                                333
                            </div>
                            <div class="col" >
                                <button class="primary-btn" href="">Detalhes</button>
                            </div>
                        </div>
                        <div class="oferta row text-center">
                            <div class="col">
                                7:10
                            </div>
                            <div class="col">
                                10:40
                            </div>
                            <div class="col">
                                direto
                            </div>
                            <div class="col">
                                2h 30m
                            </div>
                            <div class="col">
                                333
                            </div>
                            <div class="col" >
                                <button class="primary-btn" href="">Detalhes</button>
                            </div>
                        </div>
                        <div class="oferta row text-center">
                            <div class="col">
                                7:10
                            </div>
                            <div class="col">
                                10:40
                            </div>
                            <div class="col">
                                direto
                            </div>
                            <div class="col">
                                2h 30m
                            </div>
                            <div class="col">
                                333
                            </div>
                            <div class="col" >
                                <button class="primary-btn" href="">Detalhes</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center height-test">
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>
</div>
