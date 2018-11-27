<?php

use yii\db\Migration;

/**
 * Handles adding project_id to table `task`.
 */
class m181127_031149_add_project_id_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'project_id', $this->integer()->notNull()->after('estimation'));
        $this->addForeignKey('fx_task_project', 'task', ['project_id'], 'project', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'project_id');
    }
}
