<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model1 app\models\Report */

$this->title = 'Update Report: ' . $model1->id;
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model1->id, 'url' => ['view', 'id' => $model1->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model1' => $model1,
    ]) ?>

</div>
