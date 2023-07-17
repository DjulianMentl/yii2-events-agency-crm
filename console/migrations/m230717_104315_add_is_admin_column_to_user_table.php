<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m230717_104315_add_is_admin_column_to_user_table extends Migration
{

    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'is_admin', $this->smallInteger()->notNull()->defaultValue(0));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'is_admin');
    }
}
