<?php

use common\models\Venda;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Histórico de compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <title><?= Html::encode($this->title) ?></title>



    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>
            </div>
        </div>
    </section>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">ID Compra</th>
                            <th scope="col">Data</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Numero artigos</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- primeiro produto -->
                        <?php
                            foreach ($listaVendas as $venda)
                            {
                                ?>
                                <tr data-bs-toggle="collapse" href="#collapse<?= $venda->id?>" aria-expanded="true">
                                    <td>
                                        <h5><?=$venda->id?></h5>
                                    </td>
                                    <td>
                                        <h5><?=$venda->data_compra?></h5>
                                    </td>
                                    <td>
                                        <p><?=$venda->estado?></p>
                                    </td>
                                    <td>
                                        <h5><?=count($venda->itemVendas)?></h5>
                                    </td>
                                    <td>
                                        <h5><?=$subtotais[$venda->id]?>€</h5>
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                    </td>

                                </tr>
                                <tr id="collapse<?=$venda->id?>" class="collapse card-body" data-bs-parent="#accordion" >
                                    <td colspan="5">
                                        <table class="table border">
                                            <thead>
                                            <tr><th>Partida</th><th>Horário Partida</th><th>Destino</th><th>Numero escalas</th><th>Passaporte</th><th>Classe</th><th>Voo</th><th>Preco</th><th class="action-column">&nbsp;</th></tr>
                                            </thead>

                                            <tbody>

                                        <?php

                                        foreach ($venda->itemVendas as $itemvenda)
                                        {
                                            $indiceMaximo = count($itemvenda->voo->escalaVoos)-1;
                                            ?>
                                            <tr class="m-0">
                                                <td><?=$itemvenda->voo->escalaVoos[0]->partida?></td>
                                                <td><?=$itemvenda->voo->escalaVoos[0]->horario_partida?></td>
                                                <td><?=$itemvenda->voo->escalaVoos[$indiceMaximo]->destino?></td>
                                                <td><?=$indiceMaximo+1 ? $indiceMaximo+1 : 'direto'?></td>
                                                <td><?=$itemvenda->passaporte ?></td>
                                                <td><?=$itemvenda->classe->designacao?></td>
                                                <td><?=$itemvenda->voo->designacao?></td>
                                                <td><?php
                                                    $classeid =  $itemvenda->classe->id;
                                                    $detalhesvoo = $itemvenda->voo->detalheVoos;
                                                    foreach( $detalhesvoo as $detalhe)
                                                    {
                                                        if($detalhe->id_classe == $classeid){
                                                            echo $detalhe->preço.'€';
                                                        }
                                                    }
                                                    ?></td>
                                            </tr>
                                            <?php

                                        }
                                        ?>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>

                                <?php
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->


</div>
