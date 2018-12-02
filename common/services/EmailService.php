<?php
namespace common\services;


use Yii;
use yii\base\Component;

class EmailService extends Component {
    public function send($viewHTML, $viewText, $data, $to, $subject) {
        Yii::$app
            ->mailer
            ->compose(
                ['html' => $viewHTML, 'text' => $viewText],
                $data
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
}