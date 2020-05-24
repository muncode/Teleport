<?php

use app\models\Report;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

?>
    <h1>Reports</h1>

    <table class="table table-hover">
        <thead><tr><td>id</td><td>date</td><td>user</td><td>summ</td><td>button</td></tr></thead>
        <?php foreach ($reports as $report): ?>
            <tr scope="row">
                <td>
                    <?= $report->id;
                    ?>
                </td><td>
                    <?= $report->date ?>
                </td><td>
                    <?php foreach ($report->users as $users){
                        echo $users->id . "-" , $users->name . "-", $users->telephone;
                    } ?>
                </td><td>
                    <?= $report->summ ?>
                </td><td>
                    <?= $report->act ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
var_dump ($dataProvider);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [ 'class' => 'yii\grid\SerialColumn'],
        'id',
        'date',
        'user_id',
        'summ',
        'act',
        'users.id',
        'users.name',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]) ?>

