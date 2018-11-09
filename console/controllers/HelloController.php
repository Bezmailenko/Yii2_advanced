<?php
namespace console\controllers;

use yii\console\ExitCode;
use yii\console\Controller;

/**
 * Console Hello Controller
 */
class HelloController extends Controller
{
        /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
        public function actionIndex($message = 'Console page "Hello world!"')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
}
