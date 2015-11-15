<?php

use yii\db\Migration;
use yii\db\Schema;

class m150320_102452_init_translations extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('message_source', [
            'id' => 'pk',
            'category' => Schema::TYPE_STRING . '(32) COLLATE utf8_unicode_ci NOT NULL',
            'message' => Schema::TYPE_TEXT . ' NOT NULL',
            'immutable' => Schema::TYPE_INTEGER . '(1) DEFAULT 0',
        ], $tableOptions);

        $this->createTable('message', [
            'id' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_STRING . '(16) COLLATE utf8_unicode_ci NOT NULL',
            'translation' => Schema::TYPE_TEXT . ' DEFAULT NULL',
        ], $tableOptions);

        $this->addPrimaryKey('message_pk', 'message', ['id', 'language']);
        $this->addForeignKey('fk_message_source_message', 'message', 'id', 'message_source', 'id', 'CASCADE', 'RESTRICT');

    }

    public function down()
    {
        $this->dropForeignKey('fk_message_source_message', 'message');

        $this->dropTable('message');
        $this->dropTable('message_source');

    }
}