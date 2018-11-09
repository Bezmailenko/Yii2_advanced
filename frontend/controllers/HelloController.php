<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Frontend Hello Controller
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
        return 'Frontend page "Hello world!"';
    }
}
