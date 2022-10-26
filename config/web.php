<?php

use PhpParser\Node\Stmt\Expression;
use yii\web\Controller;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'First one',
    //'defaultRoute' => 'site/login',
    'layout' => 'main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JWezAmoHc0lc1JMF2gKKV5VOESOeW0x2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        //pentru un link mai compact
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,


    /*///tuorial 6
    'on beforeAction' => function(){
        echo Yii::$app->view->render(view: '@app/views/page/about');
    }//*/

    /*//tutorial 5
    'on beforeAction' => function() {
        echo '<pre><br><br><br><br> 2. ';
            var_dump("Application before action");
        echo '</pre>';
    
    Yii::$app->controller->on(Controller::EVENT_BEFORE_ACTION, function(){
        echo '<pre> 3. ';
            var_dump("Controller before action from ->on method");
        echo '</pre>';
    });
    }///*/

    /*///tutorial 3
    'on beforeRequest' => function(){
        echo '<pre><br><br><br>';
        var_dump("From before request");
        echo '</pre>';
    }
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
