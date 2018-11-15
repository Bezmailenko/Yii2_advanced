<?php

use yii\db\Migration;

/**
 * Class m181109_125949_add_user
 */
class m181109_125949_add_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'name' => $this->string(255),
            'avatar' => $this->string(255),
            'email' => $this->string(255),
            'auth_key' => $this->string(255)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'password_hash' => $this->string(255)->notNull(),
            'access_token' => $this->string(255),
            'creator_id' => $this->integer(),
            'updater_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181109_125949_add_user cannot be reverted.\n";

        return false;
    }
    */
}
