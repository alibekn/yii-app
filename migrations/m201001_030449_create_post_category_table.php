<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category}}`.
 */
class m201001_030449_create_post_category_table extends Migration
{
    public $tableName = '{{%post_category}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string(),
            'icon' => $this->string(),
            'sort_order' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
