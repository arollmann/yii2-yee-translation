<?php

namespace yeesoft\translation\controllers;

use yeesoft\controllers\admin\BaseController;
use Yii;

/**
 * MessageSourceController implements the CRUD actions for yeesoft\translation\models\MessageSource model.
 */
class MessageSourceController extends BaseController
{
    public $modelClass = 'yeesoft\translation\models\MessageSource';
    public $modelSearchClass = 'yeesoft\translation\models\MessageSourceSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}