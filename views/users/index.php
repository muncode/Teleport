<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<h1>Users</h1>

<table class="table table-hover">
    <thead><tr><td>id</td><td>tel</td><td>name</td><td>balance</td><td>status</td></tr></thead>
    <?php foreach ($users as $user): ?>
<tr  scope="row">
    <td>
        <?= $user->id ?>
    </td><td>
        <?= Html::encode("{$user->telephone}")?>
    </td><td>
        <?= Html::encode("{$user->name}") ?>
    </td><td>
        <?= $user->balance ?>
    </td><td>
        <?= $user->status ?>
    </td>
</tr>
    <?php endforeach; ?>
</table>
<?= LinkPager::widget(['pagination'=> $pagination]) ?>