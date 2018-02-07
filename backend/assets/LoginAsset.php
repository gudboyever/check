<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-switch.min.css',
        'css/bootstrap.min.css',
        'css/components-md.min.css',
        'css/font_googleapi_family.css',
        'css/font-awesome.min.css',
        'css/login.min.css',
        'css/plugins-md.min.css',
        'css/select2-bootstrap.min.css',
        'css/select2.min.css',
        'css/simple-line-icons.min.css',
    ];
    public $js = [
        'js/additional-methods.min.js',
        'js/app.min.js',
        'js/bootstrap-switch.min.js',
        'js/bootstrap.min.js',
        'js/jquery.blockui.min.js',
        'js/jquery.min.js',
        'js/jquery.slimscroll.min.js',        
        'js/jquery.validate.min.js',
        'js/js.cookie.min.js',
        'js/login.min.js',
        'js/select2.full.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
