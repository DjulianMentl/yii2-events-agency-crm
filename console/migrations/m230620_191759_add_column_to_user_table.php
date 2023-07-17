<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m230620_191759_add_column_to_user_table extends Migration
{
    private $tableName = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'first_name', $this->string(255));
        $this->addColumn($this->tableName, 'last_name', $this->string(255));
        $this->addColumn($this->tableName, 'address', $this->string(255));
        $this->addColumn($this->tableName, 'city', $this->string(255));
        $this->addColumn($this->tableName, 'phone', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'first_name');
        $this->dropColumn($this->tableName, 'last_name');
        $this->dropColumn($this->tableName, 'address');
        $this->dropColumn($this->tableName, 'city');
        $this->dropColumn($this->tableName, 'phone');
    }
}
