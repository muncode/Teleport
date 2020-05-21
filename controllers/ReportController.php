<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Report;

class ReportController extends Controller
{

    public function actionIndex()
    {
        $query = Report::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $reports = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this-> render('index', [
            'reports' => $reports,
            'pagination' => $pagination,
        ]);
    }
}

