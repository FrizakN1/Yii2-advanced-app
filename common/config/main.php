<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'name' => 'FreshNews',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authClientCollection' => [
            'class' => yii\authclient\Collection::className(),
            'clients' => [
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '556881637331-jpe1j2vdirp2fcrkufg7cu5hjd7bs4io.apps.googleusercontent.com',
                    'clientSecret' => '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',
                    'returnUrl' => 'http://localhost/user/security/auth?authclient=google'
                ],
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '51396940',
                    'clientSecret' => 'jyKJ8nLVaTHJb5bME0pq',
                ],
                'yandex' => [
                    'class'        => 'dektrium\user\clients\Yandex',
                    'clientId'     => '0881409225a945ce90e35707299749a8',
                    'clientSecret' => '2703d3b8a0fe4781918b39c5ed050937',
                    'returnUrl' => 'http://localhost/user/security/auth?authclient=yandex'
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation' => true,
            'enableUnconfirmedLogin' => false,
            'enablePasswordRecovery' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
        ],
    ],
];
