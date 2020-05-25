<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Report */
/* @var $form ActiveForm */

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'telephone',
            'name',
            'balance',
            [
                'attribute'=>'status',
                'value' => function($data){
                    return $data->status ? 'Активный' : 'Заблокирован';
                }
            ],
            [
                'header' => 'Статус',
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return [$action='users/upgrate/','id'=>$model['id']];
                },
                'template'=>'Изменить {update}',
            ],
            'report.summ',

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php

$this->title = 'Create Users';

Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => $this->title],
    'footer' => 'Низ окна',
]);

?>

<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php Modal::end(); ?>

<?php

$this->title = 'Create Report';

Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => $this->title],
    'footer' => 'Низ окна',
]);

?>
<div class="report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('@app/views/report/_form', [
        'model1' => $model1,
    ]) ?>

</div>

<?php Modal::end(); ?>

