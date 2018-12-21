<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'emailService' => [
            'class' => \common\services\EmailService::class,
        ],
        'notificationService' => [
            'class' => \common\services\NotificationService::class,
        ],
        'projectService' => [
            'class' => \common\services\ProjectService::class,
            'on '.\common\services\ProjectService::EVENT_ASSIGN_ROLE =>
                function(\common\services\AssignRoleEvent $event) {
                    Yii::$app->notificationService->notifyUserRoleChange($event);
            }
        ],
        'taskService' => [
            'class' => \common\services\TaskService::class,
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
                // ...
            ],
        ],
    ],
    'modules' => [
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
    ],
];
