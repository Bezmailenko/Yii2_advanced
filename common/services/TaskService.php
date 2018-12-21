<?php
namespace common\services;

use common\models\Project;
use common\models\ProjectUser;
use common\models\Task;
use common\models\User;
use Yii;
use yii\base\Component;
use yii\base\Event;


class TaskService extends Component {

    /**
     * @param Task $task
     * @param User $user
     * @return bool
     */
    public function canManage(Task $task, User $user) {
        return Yii::$app->projectService->hasRole($task->project, $user, ProjectUser::ROLE_MANAGER);
    }

    /**
     * @param Task $task
     * @param User $user
     * @return bool
     */
    public function canTake(Task $task, User $user) {
        return Yii::$app->projectService->hasRole($task->project, $user, ProjectUser::ROLE_DEVELOPER) &&
            $task->executor_id == null;
    }

    /**
     * @param Task $task
     * @param User $user
     * @return bool
     */
    public function canComplete(Task $task, User $user) {
        return $task->executor_id == $user && $task->completed_at == null;
    }


    /**
     * @param Task $task
     * @param $user
     * @return Task
     */
    public function takeTask(Task $task, $user) {
        $task->executor_id = $user;
        $task->started_at = time();
        $task->save();
        return $task;
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function completedTask(Task $task) {
        $task->completed_at = time();
        $task->save();
        return $task;
    }

}