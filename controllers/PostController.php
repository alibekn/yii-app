<?php

namespace app\controllers;

use app\models\search\PostSearch;
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

}