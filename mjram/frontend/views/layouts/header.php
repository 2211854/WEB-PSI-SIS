<?php
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                NavBar::begin([
                        'brandLabel' =>  Html::img('@web/img/logo.png'),
                        'brandUrl' => Yii::$app->homeUrl,
                         'options' => [
                                 'class' => 'navbar navbar-expand-lg navbar-light main_box']
                        ]
                );
                $menuItems = [
                    ['label' => 'Página Inicial', 'url' => ['/site/index']],
                    ['label' => 'Carrinho', 'url' => ['/venda/carrinho'] ,'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Histórico', 'url' => ['/venda/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Entrar', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ];

                if (!Yii::$app->user->isGuest) {
                    $menuItems[] = Html::tag('li',

                        Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Sair(' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn nav-link']
                        )
                        . Html::endForm()
                    , ['class' => 'nav-item']);
                }

                echo Nav::widget([
                    'options' => [
                        'class' => 'nav navbar-nav menu_nav ml-auto'
                    ],
                    'items' => $menuItems,
                ]);

                NavBar::end();
                ?>

    </div>
</header>
<!-- End Header Area -->
