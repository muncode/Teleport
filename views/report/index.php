<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $total = 0;
    foreach ($dataProvider->models as $m){
        $total += $m->summ;
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            [
                'attribute'=>'name',
                'format' => 'text',
                'content'=>function($data){
                    return $data['users']['name'];
                }
            ],
            'name',
            'user_id',
            'users.telephone',
            'users.name',
            [
                'filter' => null,
                'header' => 'Сумма',
                'value' => 'summ',
                'footer' => 'Итого: ' . $total
            ],
            'act',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
