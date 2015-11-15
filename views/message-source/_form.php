<?php

use yeesoft\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yeesoft\translation\models\MessageSource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-source-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'message-source-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'immutable')->textInput() ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['id'] ?> :
                            </label>
                            <span><?= $model->id ?></span>
                        </div>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Cancel', ['/translation/source/index'], ['class' => 'btn btn-default']) ?>
                            <?php else: ?>
                                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['/translation/source/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
