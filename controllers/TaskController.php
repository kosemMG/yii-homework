<?php

namespace app\controllers;

use app\models\filters\TaskSearch;
use app\models\tables\TaskComments;
use app\models\tables\TaskFiles;
use app\models\Upload;
use Yii;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class TaskController extends Controller
{
    /**
     * Displays task previews.
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
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
            Yii::$app->session->setFlash('success', Yii::t('app', 'task-update-success'));
            return $this->redirect(['one', 'id' => $model->id]);
        } else {
//            Yii::$app->session->setFlash('error', Yii::t('app', 'task-update-error'));
        }

        return $this->render('task_view', [
            'taskModel' => $this->findModel($id),
            'uploadModel' => new Upload(),
            'taskCommentForm' => new TaskComments(),
            'userId' => Yii::$app->user->id,
            'users' => $this->getUsers(),
            'statuses' => $this->getTaskStatuses()
        ]);
    }

    public function actionUpload(int $id)
    {
        $uploadModel = new Upload();
        if ($uploadModel->load(Yii::$app->request->post())) {
            $uploadModel->file = UploadedFile::getInstance($uploadModel, 'file');

            $filename = $uploadModel->run();

            $model = new TaskFiles();
            $model->setAttributes([
                'task_id' => $id,
                'path' => Yii::getAlias("@web/img/{$filename}"),
                'path_small' => Yii::getAlias("@web/img/small/{$filename}")
            ]);

            $model->save();

            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return false;
    }

    public function actionAddComment()
    {
        $model = new TaskComments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'comment-success'));
        } else {
            Yii::$app->session->setFlash('error', Yii::t('app', 'comment-error'));
        }

        $this->redirect(Yii::$app->request->referrer);
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