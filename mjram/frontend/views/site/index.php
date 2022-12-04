<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
$this->title = 'Index';
?>
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Procura. Reserva. Viaja.</h1>
                                <p>Encontra um voo flexível para a tua próxima viagem.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <?= Html::img('@web/img/banner/banner-img.png', ['class' => 'img-fluid']);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <form  class="row features-inner" saction="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <!--single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <?= Html::img('@web/img/features/partida.png', ['width'=>'60']);?>
                    </div>
                    <h6>Partida:</h6>
                    <input class="form-control" name="Partida" placeholder="De onde?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'De onde? '"
                           required="" >
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <?= Html::img('@web/img/features/chegada.png', ['width'=>'60']);?>
                    </div>
                    <h6>Chegada:</h6>
                    <input class="form-control" name="Chegada"  placeholder="Para onde?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Para onde?'"
                           required="" >
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <?= Html::img('@web/img/features/calendario.png', ['width'=>'60']);?>
                    </div>
                    <h6>Dia:</h6>
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="Chegada"  placeholder="XXXX-XX-XX" onfocus="this.placeholder = ''" onblur="this.placeholder = 'XXXX-XX-XX'" required="">
                        <span class="input-group-append">
	                        </span>
                    </div>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <?= Html::img('@web/img/features/procurar.png', ['width'=>'60']);?>
                    </div>
                    <button href="" class="primary-btn">Procurar</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <?= Html::img('@web/img/category/c1.jpg', ['class' => 'img-fluid w-100']);?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <?= Html::img('@web/img/category/c2.png', ['class' => 'img-fluid w-100']);?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <?= Html::img('@web/img/category/c3.jpg', ['class' => 'img-fluid w-100']);?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <?= Html::img('@web/img/category/c4.jpg', ['class' => 'img-fluid w-100']);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <?= Html::img('@web/img/category/c5.jpg', ['class' => 'img-fluid w-100']);?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->
