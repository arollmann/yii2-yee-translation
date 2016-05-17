<?php

use yeesoft\db\PermissionsMigration;

class m151121_131210_add_translation_permissions extends PermissionsMigration
{

    public function beforeUp()
    {
        $this->addPermissionsGroup('translations', 'Translations');
    }

    public function afterDown()
    {
        $this->deletePermissionsGroup('translations');
    }

    public function getPermissions()
    {
        return [
            'translations' => [
                'links' => [
                    '/admin/translation/*',
                    '/admin/translation/default/*',
                    '/admin/translation/source/*',
                ],
                'viewTranslations' => [
                    'title' => 'View Message Translations',
                    'roles' => [self::ROLE_ADMIN],
                    'links' => [
                        '/admin/translation/default/index',
                    ],
                ],
                'updateTranslations' => [
                    'title' => 'Update Message Translations',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewTranslations'],
                ],
                'createSourceMessages' => [
                    'title' => 'Create Source Messages',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewTranslations', 'updateSourceMessages'],
                    'links' => [
                        '/admin/translation/source/create',
                    ],
                ],
                'updateSourceMessages' => [
                    'title' => 'Update Source Messages',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewTranslations', 'updateTranslations'],
                    'links' => [
                        '/admin/translation/source/update',
                    ],
                ],
                'deleteSourceMessages' => [
                    'title' => 'Delete Source Messages',
                    'roles' => [self::ROLE_ADMIN],
                    'childs' => ['viewTranslations', 'updateSourceMessages'],
                    'links' => [
                        '/admin/translation/source/delete',
                    ],
                ],
                'updateImmutableSourceMessages' => [
                    'title' => 'Update Immutable Source Messages',
                    'childs' => ['viewTranslations', 'updateSourceMessages'],
                ],
            ],
        ];
    }

}
