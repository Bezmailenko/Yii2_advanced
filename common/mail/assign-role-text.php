<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $project common\models\Project */
/* @var $role string */

?>
Hello <?= $user->username ?>,
Your role has changed
New role in project <?= $project->title ?> - <?= $role ?>
