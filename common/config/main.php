<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@frontendUrl' => 'http://lamp-emrindya.tc200py.tcenv.cloud',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'currencyCode' => 'USD',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
    ],
];
