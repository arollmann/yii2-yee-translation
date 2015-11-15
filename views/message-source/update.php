<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yeesoft\translation\models\MessageSource */

$this->title = 'Update Message Source: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Message Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'immutable' => $model->immutable]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-source-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>