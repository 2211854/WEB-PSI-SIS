<?php
use yii\helpers\Html;
?>
<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><?= Html::img('@web/img/logo.png');?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active">
                            <?= Html::a('Inicio',['site/index'],['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('Login',['site/login'],['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= Html::a('Registar',['site/signup'],['class' => 'nav-link']) ?>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="category.html">Pesquisa</a></li>
                        <li class="nav-item">
                            <?= Html::a('Voo',['voo/index'],['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="cart.html">Carrinho</a></li>
                        <li class="nav-item"><a class="nav-link" href="checkout.html">compra</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart1.html">Historico</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- End Header Area -->
