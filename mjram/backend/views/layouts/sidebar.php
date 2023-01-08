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
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$username?></a>
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
                        ['label' => 'VOOS', 'header' => true],
                        [
                            'label' => 'Aviao',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['aviao/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['aviao/create'], 'iconStyle' => 'far'],
                            ]

                        ],
                        [
                            'label' => 'classe',
                            'icon' => 'couch',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['classe/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['classe/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Companhia',
                            'icon' => 'building',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['companhia/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['companhia/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Funcionarios',
                            'icon' => 'users',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['funcionario/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['funcionario/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Hangar',
                            'icon' => 'warehouse',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['hangar/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['hangar/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Pista',
                            'icon' => 'road',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['pista/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['pista/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Unidade Medida',
                            'icon' => 'weight-hanging',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['unidademedida/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['unidademedida/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Categoria Recurso',
                            'icon' => 'layer-group',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['categoriarecurso/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['categoriarecurso/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Voo',
                            'icon' => 'plane-departure',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['voo/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['voo/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Detalhe Voo',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['detalhevoo/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['detalhevoo/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Escala Voo',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['escalavoo/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['escalavoo/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Pedido Recurso',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['pedidorecurso/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['pedidorecurso/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Recurso',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['recurso/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['recurso/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Tarefa',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['tarefa/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['tarefa/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Utilizador',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['utilizador/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['utilizador/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'ocupacao',
                            'icon' => 'plane',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['ocupacao/index'], 'iconStyle' => 'far'],
                                ['label' => 'Criar', 'url' => ['ocupacao/create'], 'iconStyle' => 'far'],
                            ]
                        ],
                        ['label' => 'GII', 'header' => true],
                        ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                        ['label' => 'UTILIZADORES', 'header' => true],
                        ['label' => 'Adicionar', 'url' => ['site/signup'], 'icon' => 'sign-in-alt'],




                    ],
                ]);
            }
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>