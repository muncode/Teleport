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

$this->title = 'Список пользователей';
?>

<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone',
            'name',
            [
                'label' => 'Баланс',
                'attribute'=>'summm',
                'value' => function($model) {
                    $summm=0;
                    foreach ($model->report as $group) {
                        $summm += $group->summ;
                    }
                    return ($summm);
                },
            ],
            [
                'attribute'=>'status',
                'value' => function($data){
                    return $data->status ? 'Активный' : 'Заблокирован';
                }
            ],
            [
                'header' => 'Изменить статус',
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return [$action='users/upgrate/','id'=>$model['id']];
                },
                'template'=>'Изменить {update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<?php

$this->title = 'Регистрация пользователя';

Modal::begin([
    'toggleButton' => ['label' => $this->title],
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

$this->title = 'Пополнить баланс';

Modal::begin([
    'toggleButton' => ['label' => $this->title],
]);

?>
<div class="report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('@app/views/report/_form', [
        'model1' => $model1,
    ]) ?>

</div>

<?php Modal::end(); ?>

