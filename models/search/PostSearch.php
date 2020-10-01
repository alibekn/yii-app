<?php


namespace app\models\search;


use common\models\Post;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PostSearch extends Model
{
    const MAIN_PAGE_NUMBER = 1;

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
        $query = Post::find()
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