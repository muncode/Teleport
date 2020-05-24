<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Report;
use yii\data\ActiveDataProvider;

class ReportController extends Controller
{

    public function actionIndex()
    {
     //   $searchModel = new ReportSearch();

        $query = Report::find()
            ->select('*')
            ->innerJoinWith('users');

        $reports = $query->orderBy('report.id')
            ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this-> render('index', [
            'reports' => $reports,
            'dataProvider' => $dataProvider,
        ]);
    }

}

