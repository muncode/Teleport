<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model1 app\models\ReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model1, 'id') ?>

    <?= $form->field($model1, 'date') ?>

    <?= $form->field($model1, 'user_id') ?>

    <?= $form->field($model1, 'summ') ?>

    <?= $form->field($model1, 'act') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
