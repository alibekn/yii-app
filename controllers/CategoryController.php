<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostCategory;
use app\models\search\CategorySearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $provider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'provider' => $provider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($slug)
    {
        $category = PostCategory::find()
            ->andWhere(['slug' => $slug])
            ->one();

        $query = Post::find()
            ->andWhere(['category_id' => $category->id])
            ->andWhere(['status' => Post::STATUS_ENABLED])
            ->all();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ],
            'pagination' => [
                'pageParam' => 'p',
                'pageSizeParam' => false,
                'forcePageParam' => false
            ],
        ]);

        return $this->render('view', [
            'provider' => $provider,
            'category' => $category
        ]);
    }

}