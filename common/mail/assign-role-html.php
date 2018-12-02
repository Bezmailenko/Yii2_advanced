<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $project common\models\Project */
/* @var $role string */

?>

    <p>Hello <?= $user->username ?>,</p>

    <p>Your role has changed</p>
    <p>New role in project <?= $project->title ?> - <?= $role ?></p>


