<?php
namespace backend\controllers;

use yii\web\Controller;

/**
 * Backend Hello Controller
 */
class HelloController extends Controller
{

    /**
     * Displays Hello world page.
     *
     * @return string
     */
    public function actionIndex()
    {
        return 'Backend page "Hello world!"';
    }
}
