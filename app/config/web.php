<?php

// Define environment-specific configurations
$environment    = getenv('YII_ENV');
$debug_mode     = getenv('YII_DEBUG');

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'hum',
    'name' => 'Humorous Units of Measurement',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! Add a secret key (if it is empty).
            // This is required by cookie validation.
            'cookieValidationKey' => '1mSpATIPEkRfucErk8011JeHakQfIdE1',
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
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //---------- C O R E   R O U T E S ----------//
                '/'         => 'site/index',
                '/login'    => 'site/login',
                '/logout'   => 'site/logout',
                // Static pages
                '/about'    => 'site/about',
                '/contact'  => 'site/contact',
                //----- Default routes -----//
                // IMPORTANT: The defaults should always be at the bottom of the list.
                '<controller:\w+>/<id:\d+>'					=> '<controller>/view',
                '<controller:\w+>'							=> '<controller>/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>'	=> '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'				=> '<controller>/<action>',
                '<controller>/<id:\d>/<action>'             => '<controller>/<action>'
            ],
        ],
    ],
    'params' => $params,
];

if ($environment == 'dev')
{
    if ($debug_mode == 'true')
    {
        $config['bootstrap'][] = 'debug';
        $config['modules']['debug'] = [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ];
    }

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
