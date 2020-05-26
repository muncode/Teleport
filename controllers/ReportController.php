<?php

namespace app\controllers;

use Yii;
use app\models\Report;
use app\models\ReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Report models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Report model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Report model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model1 = new Report();

        if ($model1->load(Yii::$app->request->post()) && $model1->save()) {
            return $this->redirect(['view', 'id' => $model1->id]);
        }

        return $this->render('create', [
            'model1' => $model1,
        ]);
    }

    /**
     * Updates an existing Report model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model1 = $this->findModel($id);

        if ($model1->load(Yii::$app->request->post()) && $model1->save()) {
            return $this->redirect(['view', 'id' => $model1->id]);
        }

        return $this->render('update', [
            'model1' => $model1,
        ]);
    }

    public function actionUpgrate($id)
    {
        $model1 = $this->findModel($id);
        $model1->act == 1 ? $model1->act = 0 : $model1->act = 1;
        $model1->summ = 0;
        $model1->save();
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Report model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Report the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model1 = Report::findOne($id)) !== null) {
            return $model1;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
