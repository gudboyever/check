<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
         'css/bootstrap.min.css',
          'css/bootstrap-switch.css',
           'css/bootstrap-switch.min.css',
            'css/colorpicker.css',
             'css/components-md.min.css',
              'css/custom.min.css',
               'css/daterangepicker.css',
                'css/daterangepicker.min.css',
                 'css/default.min.css',
                  'css/font-awesome.min.css',
                   'css/jqvmap.css', 
                    'css/layout.min.css',
                     'css/morris.css',
                       'css/morris.css',
                       'css/simple-line-icons.min.css',
                       'css/custom.css',
    ];
    public $js = [
        'js/amcharts.js',
    'js/ammap.js',
    'js/ammap_amcharts_extension.js',
    'js/amstock.js',
    'js/app.min.js',
    'js/bootstrap.min.js',
    'js/bootstrap-switch.min.js',
    'js/dashboard.min.js',
    'js/daterangepicker.min.js',
    'js/demo.min.js',

    'js/fullcalendar.min.js',
    'js/funnel.js',
    'js/gantt.js',
    'js/gauge.js',
    'js/horizontal-timeline.min.js',
    'js/init.js',
    'js/jquery.blockui.min.js',
    'js/jquery.counterup.min.js',
    'js/jquery.easypiechart.min.js',
    'js/jquery.flot.categories.min.js',

    'js/jquery.flot.min.js',
    'js/jquery.flot.resize.min.js',
    'js/jquery.slimscroll.min.js',
    'js/jquery.sparkline.min.js',
    'js/jquery.vmap.europe.js',
    'js/jquery.vmap.germany.js',
    'js/jquery.vmap.min.js',
    'js/jquery.vmap.russia.js',
    'js/jquery.vmap.sampledata.js',
    'js/jquery.vmap.usa.js',

    'js/jquery.vmap.world.js',
    'js/jquery.waypoints.min.js',
    'js/js.cookie.min.js',
    'js/layout.min.js',
    'js/moment.min.js',
    'js/morris.min.js',
    'js/pie.js',
    'js/quick-nav.min.js',
    'js/quick-sidebar.min.js',
    'js/radar.js',

    'js/raphael-min.js',
    'js/serial.js',
    'js/validationerror.js',
    'js/xy.js',
    'js/ icons-lte-ie7.js',
    'js/jquery.vmap.min.js',
    'js/datatable.js',
	 'js/datatable.min.js',
	 'js/table-datatables-managed.js',
	 'js/datatables.bootstrap.js',
	 'js/active.js',
     'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
