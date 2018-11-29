<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

\yii\base\Event::on(
    \yii\web\User::class,
    \yii\web\User::EVENT_AFTER_LOGIN,
    function (\yii\web\UserEvent $event) {
        Yii::info('Login user=' . $event->identity->username, 'auth');
    }
);