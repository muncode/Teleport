<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1>Reports</h1>

    <table class="table table-hover">
        <thead><tr><td>id</td><td>date</td><td>name</td><td>balance</td><td>status</td></tr></thead>
        <?php foreach ($reports as $report): ?>
            <tr scope="row">
                <td>
                    <?= $report->id ?>
                </td><td>
                    <?= $report->date ?>
                </td><td>
                    <?= $report->user_id ?>
                </td><td>
                    <?= $report->summ ?>
                </td><td>
                    <?= $report->act ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?= LinkPager::widget(['pagination'=> $pagination]) ?>