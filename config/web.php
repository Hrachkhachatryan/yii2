<?php
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db-local.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'homeUrl' => 'https://github.com/opus-online/yii2-app-ecom',
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components' => [
        'request' => [
          
            'cookieValidationKey' => '',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'bankret' => 'payment/bank-return'
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'ecom' => [
            'class' => 'app\components\MyEcomComponent',
            'payment' => [
                'class' => 'opus\ecom\Payment',
                'bankReturnRoute' => 'bankret',
                'adapterConfig' => \yii\helpers\ArrayHelper::merge(
                    require 'banks-default.php',
                    require 'banks-local.php'
                )
            ],
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*'],
            'generators' => [
                'giimodel' => [
                    'class' => '\opus\giimodel\Generator',
                    'prefixMap' => [
                        'eco_' => '\app\models\ar',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];

return $config;
