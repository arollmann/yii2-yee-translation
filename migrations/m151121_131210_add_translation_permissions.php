<?php

use yii\db\Migration;
use yii\db\Schema;

class m151121_131210_add_translation_permissions extends Migration
{

    public function up()
    {
        $this->insert('auth_item_group', ['code' => 'translations', 'name' => 'Translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => '/admin/translation/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/default/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/default/index', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/source/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/source/create', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/source/update', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/translation/source/delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => 'viewTranslations', 'type' => '2', 'description' => 'View message translation', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'updateTranslations', 'type' => '2', 'description' => 'Update message translation', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'createSourceMessages', 'type' => '2', 'description' => 'Create source messages', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'updateSourceMessages', 'type' => '2', 'description' => 'Update source messages', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'deleteSourceMessages', 'type' => '2', 'description' => 'Delete source messages', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'updateImmutableSourceMessages', 'type' => '2', 'description' => 'Update immutable source messages', 'group_code' => 'translations', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item_child', ['parent' => 'viewTranslations', 'child' => '/admin/translation/default/index']);
        $this->insert('auth_item_child', ['parent' => 'createSourceMessages', 'child' => '/admin/translation/source/create']);
        $this->insert('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => '/admin/translation/source/update']);
        $this->insert('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => '/admin/translation/source/delete']);

        $this->insert('auth_item_child', ['parent' => 'updateTranslations', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => 'updateTranslations']);
        $this->insert('auth_item_child', ['parent' => 'createSourceMessages', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'createSourceMessages', 'child' => 'updateSourceMessages']);
        $this->insert('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => 'updateSourceMessages']);
        $this->insert('auth_item_child', ['parent' => 'updateImmutableSourceMessages', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'updateImmutableSourceMessages', 'child' => 'updateSourceMessages']);

        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'viewTranslations']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'updateTranslations']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'updateSourceMessages']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'createSourceMessages']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'deleteSourceMessages']);

    }

    public function down()
    {

        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'updateSourceMessages']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'createSourceMessages']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'deleteSourceMessages']);

        $this->delete('auth_item_child', ['parent' => 'updateTranslations', 'child' => 'viewTranslations']);
        $this->delete('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => 'viewTranslations']);
        $this->delete('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => 'updateTranslations']);
        $this->delete('auth_item_child', ['parent' => 'createSourceMessages', 'child' => 'viewTranslations']);
        $this->delete('auth_item_child', ['parent' => 'createSourceMessages', 'child' => 'updateSourceMessages']);
        $this->delete('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => 'viewTranslations']);
        $this->delete('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => 'updateSourceMessages']);
        $this->delete('auth_item_child', ['parent' => 'updateImmutableSourceMessages', 'child' => 'viewTranslations']);
        $this->delete('auth_item_child', ['parent' => 'updateImmutableSourceMessages', 'child' => 'updateSourceMessages']);

        $this->delete('auth_item_child', ['parent' => 'viewTranslations', 'child' => '/admin/translation/default/index']);
        $this->delete('auth_item_child', ['parent' => 'createSourceMessages', 'child' => '/admin/translation/source/create']);
        $this->delete('auth_item_child', ['parent' => 'updateSourceMessages', 'child' => '/admin/translation/source/update']);
        $this->delete('auth_item_child', ['parent' => 'deleteSourceMessages', 'child' => '/admin/translation/source/delete']);

        $this->delete('auth_item', ['name' => 'viewTranslations']);
        $this->delete('auth_item', ['name' => 'updateTranslations']);
        $this->delete('auth_item', ['name' => 'createSourceMessages']);
        $this->delete('auth_item', ['name' => 'updateSourceMessages']);
        $this->delete('auth_item', ['name' => 'deleteSourceMessages']);
        $this->delete('auth_item', ['name' => 'updateImmutableSourceMessages']);

        $this->delete('auth_item', ['name' => '/admin/translation/*']);
        $this->delete('auth_item', ['name' => '/admin/translation/default/*']);
        $this->delete('auth_item', ['name' => '/admin/translation/default/index']);
        $this->delete('auth_item', ['name' => '/admin/translation/source/*']);
        $this->delete('auth_item', ['name' => '/admin/translation/source/create']);
        $this->delete('auth_item', ['name' => '/admin/translation/source/update']);
        $this->delete('auth_item', ['name' => '/admin/translation/source/delete']);

        $this->delete('auth_item_group', ['code' => 'translations']);
    }
}