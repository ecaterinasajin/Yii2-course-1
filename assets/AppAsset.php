<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    // public $sourcePath = ' ';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'assets/favicon.ico',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css',
        'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic',
        'css/styles.css',
        //'https://startbootstrap.com/theme/landing-page',
        //'https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
        //'js/scripts.js',
        'https://cdn.startbootstrap.com/sb-forms-latest.js', 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
