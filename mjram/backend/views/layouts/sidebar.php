<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../site/index" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-circle elevation-1" alt="User Image">
            </div>
            <div class="info">
                <?= Html::a($username, ['/funcionario/profile'], ['class'=> 'd-block']) ?>
            </div>
        </div>

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" id="myBtn">
                    <i class="fas fa-adjust" id="myBtn"></i>
                </a>
            </div>
            <div class="info">
                <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post','name'=> 'btnLogout']) ?>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
  if(!Yii::$app->user->isGuest){
            echo \hail812\adminlte\widgets\Menu::widget([
                'options' => [
                    'class'=>'nav nav-pills nav-sidebar flex-column nav-legacy',
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
                'items' => [

                    [
                        'label' => 'Voo',
                        'visible' => Yii::$app->user->can('indexVoo'),
                        'icon' => 'plane-departure',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['voo/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['voo/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Aviao',
                        'visible' => Yii::$app->user->can('indexAviao'),
                        'icon' => 'plane',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['aviao/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['aviao/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Companhia',
                        'visible' => Yii::$app->user->can('indexCompanhia'),
                        'icon' => 'building',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['companhia/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['companhia/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Funcionarios',
                        'visible' => Yii::$app->user->can('indexFuncionario'),
                        'icon' => 'users',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['funcionario/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['funcionario/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Hangar',
                        'visible' => Yii::$app->user->can('indexHangar'),
                        'icon' => 'warehouse',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['hangar/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['hangar/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Pista',
                        'visible' => Yii::$app->user->can('indexPista'),
                        'icon' => 'road',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['pista/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['pista/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Classe',
                        'visible' => Yii::$app->user->can('indexClasse'),
                        'icon' => 'couch',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['classe/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['classe/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Recurso',
                        'visible' => Yii::$app->user->can('indexRecurso'),
                        'icon' => 'box',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['recurso/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['recurso/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Pedido Recurso',
                        'visible' => Yii::$app->user->can('indexPedidorecurso'),
                        'icon' => 'parachute-box',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['pedidorecurso/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['pedidorecurso/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Categoria Recurso',
                        'visible' => Yii::$app->user->can('indexCategoriarecurso'),
                        'icon' => 'layer-group',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['categoriarecurso/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['categoriarecurso/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Unidade Medida',
                        'visible' => Yii::$app->user->can('indexUnidademedida'),
                        'icon' => 'weight-hanging',
                        'items' => [
                            ['label' => 'Listar', 'url' => ['unidademedida/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar', 'url' => ['unidademedida/create'], 'iconStyle' => 'far'],
                        ]
                    ],
                ]
               
            ]);
           }
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>