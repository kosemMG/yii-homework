<?php

namespace app\controllers;

use app\models\filters\TaskSearch;
use Yii;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TaskController extends Controller
{
    /**
     * Displays task previews.
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        var_dump(Yii::$app->request->queryParams); exit;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        $dataProvider = new ActiveDataProvider([
//            'query' => Tasks::find()
//        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionOne(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['one', 'id' => $model->id]);
        }

        return $this->render('task_view', [
            'model' => $this->findModel($id),
            'users' => $this->getUsers(),
            'statuses' => $this->getTaskStatuses()
        ]);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Tasks|null
     * @throws NotFoundHttpException
     */
    protected function findModel(int $id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @return array
     */
    private function getTaskStatuses()
    {
        return TaskStatuses::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }

    /**
     * @return array
     */
    private function getUsers()
    {
        return Users::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }
}