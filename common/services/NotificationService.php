<?php
namespace common\services;

use Yii;

class NotificationService {
    public function notifyUserRoleChange($event) {
        $data = ['project' => $event->project, 'user' => $event->user, 'role' => $event->role];

        Yii::$app->emailService->send(
            'assign-role-html',
            'assign-role-text',
            $data,
            $event->user->email,
            'Your role changed'
        );
    }
}