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


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Voos | <?=$partida?> - <?=$destino?>></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
<!--            <div class="col-xl-3 col-lg-4 col-md-5">-->
<!--                <div class="sidebar-filter mt-50">-->
<!--                    <div class="top-filter-head">Product Filters</div>-->
<!--                    <div class="common-filter">-->
<!--                        <div class="head">Filtro 1</div>-->
<!--                        <form action="#">-->
<!--                            <ul>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Sub Filtro 1<span>(29)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Sub Filtro 2<span>(29)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Sub Filtro 3<span>(19)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Sub Filtro 4<span>(19)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Sub Filtro 5<span>(19)</span></label></li>-->
<!--                            </ul>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <div class="common-filter">-->
<!--                        <div class="head">Filtro 2</div>-->
<!--                        <form action="#">-->
<!--                            <ul>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Sub Filtro 1<span>(29)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Sub Filtro 2<span>(29)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Sub Filtro 3<span>(19)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Sub Filtro 4<span>(19)</span></label></li>-->
<!--                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Sub Filtro 5<span>(19)</span></label></li>-->
<!--                            </ul>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <div class="common-filter">-->
<!--                        <div class="head">Price</div>-->
<!--                        <div class="price-range-area">-->
<!--                            <div id="price-range"></div>-->
<!--                            <div class="value-wrapper d-flex">-->
<!--                                <div class="price">Price:</div>-->
<!--                                <span>$</span>-->
<!--                                <div id="lower-value"></div>-->
<!--                                <div class="to">to</div>-->
<!--                                <span>$</span>-->
<!--                                <div id="upper-value"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-xl-12 col-lg-12 col-md-7 m-5">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center height-test">
<!--                    <div class="sorting">-->
<!--                        <select>-->
<!--                            <option value="1">Default sorting</option>-->
<!--                            <option value="1">Default sorting</option>-->
<!--                            <option value="1">Default sorting</option>-->
<!--                        </select>-->
<!--                    </div>-->
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="table">
                        <div class="oferta row text-center">
                            <div class="col">
                                <h6>Horário Partida</h6>
                            </div>
                            <div class="col">
                                <h6>Horário Chegada</h6>
                            </div>
                            <div class="col">
                                <h6>Escalas</h6>
                            </div>
                            <div class="col">
                                <h6>Duração</h6>
                            </div>
                            <div class="col">
                                <h6>Preço</h6>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <?php
                            foreach ($listaVoos as $voo){
                                ?>

                                <?php
                                $i = 0;
                                foreach ($voo['detalhes'] as $detalhe){
                                    $numeroEscalas = count($voo['escalas'])-1;
                                    $data_inicio = $voo['escalas'][0]->horario_partida;
                                    $data_fim = $voo['escalas'][$numeroEscalas]->horario_chegada;
                                    $data_inicio = new DateTime($data_inicio);
                                    $data_fim = new DateTime($data_fim);

                                    ?>
                                    <div class="oferta row text-center">
                                        <div class="col">
                                            <?=$data_inicio->format('Y-m-d H:i') ?>
                                        </div>
                                        <div class="col">
                                            <?=$data_fim->format('Y-m-d H:i') ?>
                                        </div>
                                        <div class="col">
                                           <?= $numeroEscalas == 0 ? 'direto' : $numeroEscalas+1;?>
                                        </div>

                                        <div class="col">
                                            <?php
                                            // Resgata diferença entre as datas
                                            $dateInterval = $data_inicio->diff($data_fim);
                                            echo $dateInterval->format('%H h %i m');

                                            //365
                                            ?>
                                        </div>
                                        <div class="col">
                                            <?=$detalhe->preço?>
                                        </div>
                                        <div class="col" >
                                            <?=  Html::tag('button',
                                                 Html::a('Detalhes',['voo/view','id' =>$detalhe->id ],['class' => ' text-white', 'value' => 'Detalhes'])
                                                ,['class' => 'primary-btn'])
                                            ?>
                                        </div>
                                    </div>

                                    <?php
                                    $i++;
                                }
                                ?>

                            <?php
                            }
                        ?>
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
