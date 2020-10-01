<?php


namespace app\models\search;


use app\models\Post;
use app\models\PostCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CategorySearch extends Model
{
    public $p = 1;

    public function formName()
    {
        return '';
    }

    public function rules()
    {
        return [
            [['p'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = PostCategory::find()
            ->alias('t1')
            ->andWhere([
                't1.status' => Post::STATUS_ENABLED
            ]);

        $this->load($params);

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

        return $provider;
    }
}