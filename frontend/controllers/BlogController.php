<?php

namespace frontend\controllers;

use Yii;
use common\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BlogController
 */
class BlogController extends Controller
{
    public const LATEST_POST_LIMIT = 10;

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Post::find()->limit(self::LATEST_POST_LIMIT)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}