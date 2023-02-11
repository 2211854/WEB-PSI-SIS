<style>
    @media print {
        body {
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            filter: grayscale(100%);
        }
    }
</style>
<br>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Venda $model */

$this->title = 'MJRAM -  Fatura';
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-imprimir">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fatura ID <?=$venda->id?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                            <tr>
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
                                    <h5><?=$subtotal?>€</h5>
                                </td>

                            </tr>
                            <tr id="collapse<?=$venda->id?>" class="collapse card-body show" data-bs-parent="#accordion" >
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
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php

                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <br><br>
    <script>
        window.addEventListener("load", window.print());
    </script>

</div>
