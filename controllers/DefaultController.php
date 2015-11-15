<?php

namespace yeesoft\translation\controllers;

use yeesoft\controllers\admin\BaseController;
use Yii;

/**
 * MessageController implements the CRUD actions for yeesoft\translation\models\Message model.
 */
class DefaultController extends BaseController
{
    public $modelClass = 'yeesoft\translation\models\Message';
    public $modelSearchClass = 'yeesoft\translation\models\MessageSearch';

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