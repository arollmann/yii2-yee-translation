<?php

use yii\db\Migration;
use yii\db\Schema;

class m151116_212614_add_translations_menu_links extends Migration
{

    public function up()
    {
        $this->insert('menu_link', ['id' => 'settings-translations', 'menu_id' => 'admin-main-menu', 'link' => '/translation/default/index', 'parent_id' => 'settings', 'order' => 5]);
        $this->insert('menu_link_lang', ['link_id' => 'settings-translations', 'label' => 'Message Translation', 'language' => 'en' ]);
    }

    public function down()
    {
        $this->delete('menu_link', ['like', 'id', 'settings-translations']);
    }
}