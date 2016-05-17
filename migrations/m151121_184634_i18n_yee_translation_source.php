<?php

use yeesoft\db\SourceMessagesMigration;

class m151121_184634_i18n_yee_translation_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'yee/translation';
    }

    public function getMessages()
    {
        return [
            'Add New Source Message' => 1,
            'Category' => 1,
            'Create Message Source' => 1,
            'Create New Category' => 1,
            'Immutable' => 1,
            'Message Translation' => 1,
            'New Category Name' => 1,
            'Please, select message group and language to view translations...' => 1,
            'Source Message' => 1,
            'Update Message Source' => 1,
            '{n, plural, =1{1 message} other{# messages}}' => 1,
        ];
    }
}