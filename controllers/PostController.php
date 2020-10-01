<?php

namespace app\controllers;

use app\models\search\PostSearch;
use app\models\Post;
use Yii;
use yii\web\Controller;

class PostController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'provider' => $provider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($slug)
    {
        $model = Post::find()
            ->andWhere(['slug' => $slug])
            ->one();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}