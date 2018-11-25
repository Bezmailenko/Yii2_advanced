<?php

namespace frontend\modules\api\models;

class Project extends \common\models\Project {
    public function fields()
    {
        return ['title'];
    }

    public function extraFields()
    {
        return ['activedTasks', 'createdTasks', 'updatedTasks'];
    }
}
