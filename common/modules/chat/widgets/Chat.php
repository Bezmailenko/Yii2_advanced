<?php
namespace common\modules\chat\widgets;

use common\modules\chat\assets\ChatAsset;

class Chat extends \yii\bootstrap\Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        ChatAsset::register($this->view);
        return $this->render('chat');
    }
}
