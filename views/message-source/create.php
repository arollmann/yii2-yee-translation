<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yeesoft\translation\models\MessageSource */

$this->title = 'Create Message Source';
$this->params['breadcrumbs'][] = ['label' => 'Message Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="message-source-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>