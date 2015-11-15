<?php

use yeesoft\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model yeesoft\translation\models\MessageSource */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Message Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-source-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <p>
                <?= Html::a('Edit', ['/translation/source/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['/translation/source/delete', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-default',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
                <?= Html::a('Add New', ['/translation/source/create'], ['class' => 'btn btn-sm btn-primary pull-right']) ?>
            </p>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'category',
                    'message:ntext',
                    'immutable',
                ],
            ])
            ?>

        </div>
    </div>

</div>
