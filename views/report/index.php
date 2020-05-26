<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет по зачислениям';

?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

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
            'user_id',
            [
                'attribute'=>'name',
                'format' => 'text',
                'content'=>function($data){
                    return $data['users']['name'];
                }
            ],
            [
                'attribute'=>'phone',
                'format' => 'text',
                'content'=>function($data){
                    return $data['users']['phone'];
                }
            ],
            [
                'filter' => null,
                'header' => 'Сумма',
                'value' => 'summ',
                'footer' => 'Итого: ' . $total
            ],
            [
                'attribute'=>'act',
                'value' => function($data){
                    return $data->act ? 'Пополнение отменено' : 'Пополнено';
                }
            ],
            [
                'header' => 'Отменить пополнение',
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model1, $key, $index) {
                    if ($model1['act'] == 0) {
                        return [$action = 'report/upgrate/', 'id' => $model1['id']];
                    }
                },
                'template'=>'Отменить {update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
