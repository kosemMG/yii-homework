<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'en',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'language', 'taskMessenger'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@img' => '@app/web/img'
    ],
    'components' => [
        'authManager' => [
            'class' => \yii\rbac\DbManager::class
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@app/messages'
                ]
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kGRHh2wOCzrJoGmcLJ2_GrXFYuscpZuO',
        ],
        'cache' => [
//            'class' => 'yii\caching\FileCache',
            'class' => \yii\redis\Cache::class,
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0
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
            // 'useFileTransport' to false and configure a transport
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
                'tasks' => 'task/index',
                'task/<id:\d+>' => 'task/one'
            ],
        ],
        'taskMessenger' => [
            'class' => \app\models\components\TaskMessengerComponent::class
        ],
        'language' => [
            'class' => \app\models\components\LanguageComponent::class
        ]
    ],
    'params' => $params,
    'modules' => [
        'rbac' => [
            'class' => 'githubjeka\rbac\Module',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'] // all auth users
                    ],
                ]
            ]
        ],
    ],
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
