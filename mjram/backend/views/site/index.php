<?php
$this->title = 'MJRAM - Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <?php
    if(Yii::$app->user->can('indexVoo')){
    ?>
        <div class="row">

            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\InfoBox::widget([
                    'id' => 'total-voos-info-box',
                    'text' => 'Total de voos',
                    'number' => $totalVoos,
                    'theme' => 'info',
                    'icon' => 'fas fa-plane-departure',
                ]);


                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\InfoBox::widget([
                    'id' => 'voos-hoje-info-box',
                    'text' => 'Voos para hoje',
                    'number' => $voosHoje,
                    'theme' => 'success',
                    'icon' => 'fas fa-plane-departure',
                ]);
            ?>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'avioes-inoperacionais-info-box',
                    'text' => 'Avioes inoperacionais com voos pendentes',
                    'title' => $avioesInoperacionaisComVoos,
                    'theme' => 'danger',
                    'icon' => 'fas fa-plane',
                    'linkUrl' => '../aviao/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'pistas-info-box',
                    'text' => 'Pistas inoperacionais',
                    'title' => $pistasInoperacionais,
                    'theme' => 'danger',
                    'icon' => 'fas fa-road',
                    'linkUrl' => '../pista/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'avioes-danificados-info-box',
                    'text' => 'Avioes danificados',
                    'title' => $avioesDanificados,
                    'theme' => 'danger',
                    'icon' => 'fas fa-plane',
                    'linkUrl' => '../aviao/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'avioes-manutencao-info-box',
                    'text' => 'Avioes em manutenção',
                    'title' => $avioesManutencao,
                    'theme' => 'warning',
                    'icon' => 'fas fa-plane',
                    'linkUrl' => '../aviao/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'voos-planeados-info-box',
                    'text' => 'Voos planeados',
                    'title' => $voosPlaneados,
                    'theme' => 'info',
                    'icon' => 'fas fa-plane-departure',
                    'linkUrl' => '../voo/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'voos-circulacao-info-box',
                    'text' => 'Voos em circulacao',
                    'title' => $voosCirculacao,
                    'theme' => 'success',
                    'icon' => 'fas fa-plane-departure',
                    'linkUrl' => '../voo/index'
                ]);
                ?>
            </div>
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'voos-atrasados-info-box',
                    'text' => 'Voos atrasados',
                    'title' => $voosAtrasados,
                    'theme' => 'danger',
                    'icon' => 'fas fa-plane-slash',
                    'linkUrl' => '../voo/index'
                ]);
                ?>
            </div>
        </div>
    <?php }
    ?>

    <?php
    if(Yii::$app->user->can('indexFuncionario')){
        ?>
        <div class="row">
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'funcionarios-info-box',
                    'text' => 'Total de funcionarios',
                    'title' => $totalFuncionarios,
                    'theme' => 'success',
                    'icon' => 'fas fa-users',
                    'linkUrl' => '../funcionario/index'
                ]);
                ?>
            </div>
        </div>
    <?php }
    ?>

    <?php
    if(Yii::$app->user->can('indexRecurso')){
        ?>
        <div class="row">
            <div class="col-lg-3 col-6">
                <?=
                \hail812\adminlte\widgets\SmallBox::widget([
                    'id' => 'recurso-info-box',
                    'text' => 'Total de recursos inferiores a 100 unidades',
                    'title' => $poucosRecursos,
                    'theme' => 'warning',
                    'icon' => 'fas fa-box',
                    'linkUrl' => '../recurso/index'
                ]);
                ?>
            </div>
        </div>
    <?php }
    ?>


</div>