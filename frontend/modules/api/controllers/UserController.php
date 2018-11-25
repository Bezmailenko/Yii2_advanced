<?php

namespace frontend\modules\api\controllers;



use yii\rest\ActiveController;

/**
 * User controller for the `api` module
 */
class UserController extends ActiveController
{
    public $modelClass = \frontend\modules\api\models\User::class;
}
