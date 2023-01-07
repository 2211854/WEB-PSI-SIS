<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        [
            'href' => 'img/fav.png',
            'rel' => 'icon',
        ],
        'css/site.css',
        'css/linearicons.css',
        'css/font-awesome.min.css',
        'css/themify-icons.css',
        'css/bootstrap.css',
        'css/owl.carousel.css',
        'css/nice-select.css',
        'css/nouislider.min.css',
        'css/ion.rangeSlider.css',
        'css/ion.rangeSlider.skinFlat.css',
        'css/magnific-popup.css',
        'css/main.css',
        'css/bootstrap.min.css',
        'css/bootstrap-datepicker.min.css',

    ];
    public $js = [
        'js/vendor/jquery-2.2.4.min.js',
        'js/vendor/popper.min.js',
        'js/vendor/bootstrap.min.js',
        'js/jquery.ajaxchimp.min.js',
        'js/jquery.nice-select.min.js',
        'js/jquery.sticky.js',
        'js/nouislider.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/bootstrap.bundle.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/bootstrap-datepicker.pt.js',
        'js/owl.carousel.min.js',
        'js/gmaps.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
