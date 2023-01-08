<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */

$this->title = 'Voo '.$partida." -> ".$destino;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="voo-view">

    <title><?= Html::encode($this->title) ?></title>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1><?=$partida?> - <?=$destino?></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col">
                    <div class="s_product_text">
                        <h3><?=$partida?> - <?=$destino?></h3>
                        <h2><?=$detalhe->preço?>€</h2>
                        <ul class="list">
                            <li><a class="active"><span>Classe:</span><?= $detalhe->classe->designacao?></a></li>
                        </ul>
                        <p></p>
                        <div class="col">
                            <!-- Start Filter Bar -->
                            <div class="filter-bar d-flex flex-wrap align-items-center height-test">
                            </div>
                            <!-- End Filter Bar -->
                            <!-- Start Best Seller -->
                            <section class="lattest-product-area pb-40 category-list">
                                <div class="table">
                                    <div class="oferta row text-center">
                                        <div class="col">
                                            <h6>Partida<br> Local(horario)</h6>
                                        </div>
                                        <div class="col">
                                            <h6>Destino<br>Local(horario)</h6>
                                        </div>
                                        <div class="col">
                                            <h6>Data de partida</h6>
                                        </div>
                                        <div class="col">
                                            <h6>Duração</h6>
                                        </div>
                                        <div class="col">
                                            <h6>Aviao</h6>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($escalas as $escala){
                                        $data_inicio = $escala->horario_partida;
                                        $data_fim = $escala->horario_chegada;
                                        $data_inicio = new DateTime($data_inicio);
                                        $data_fim = new DateTime($data_fim);

                                        ?>
                                        <div class="oferta row text-center">
                                            <div class="col">
                                                <?=$escala->partida." (".$data_inicio->format('H:i').")"?>
                                            </div>
                                            <div class="col">
                                                <?=$escala->destino." (".$data_fim->format('H:i').")"?>
                                            </div>
                                            <div class="col">
                                                <?=$data_inicio->format('Y-m-d')?>
                                            </div>
                                            <div class="col">
                                                <?php
                                                $dateInterval = $data_inicio->diff($data_fim);
                                                echo $dateInterval->format('%H h %i m');
                                                ?>
                                            </div>
                                            <div class="col">
                                                <?=$voo->aviao->companhia->sigla?>
                                               <?=$voo->aviao->modelo?>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </section>
                            <!-- End Best Seller -->
                            <!-- Start Filter Bar -->
                            <div class="filter-bar d-flex flex-wrap align-items-center height-test" >
                            </div>
                            <!-- End Filter Bar -->
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-30">Dados do passageiro</h3>
                                <?= Html::beginForm(['venda/create','id'=>$voo->id], 'post') ?>
                                    <div class="mt-10">
                                        <?= Html::input('text', 'passaporte','', ['onfocus'=>'this.placeholder = "" ','onblur' => 'this.placeholder = "Passaporte"','class' => 'single-input','placeholder' => 'Passaporte','required' => true]) ?>
                                    </div>
                                    <br>
<!--                                    <div class="card_area d-flex align-items-center">-->
<!--                                        <a class="primary-btn" href="#">Importar os meus dados</a>-->
<!--                                    </div>-->
                                    <p></p>
                                    <div class="card_area d-flex align-items-center">
                                        <?=Html::submitButton('Adicionar ao carrinho',['class' => 'primary-btn'])?>
                                    </div>
                                <?php Html::endForm(); ?>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

</div>
