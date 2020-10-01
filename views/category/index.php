<?php
/* @var $this yii\web\View */
/* @var $searchModel \app\models\search\CategorySearch */
/* @var $provider \yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Post Categories';
$this->params['breadcrumbs'][] = $this->title;
$models = $provider->getModels();
?>
<h1><?= $this->title ?></h1>

<div class="row">
    <ul>
        <?php foreach ($models as $model) : ?>
            <li><a href="<?= Url::to(['category/view', 'slug' => $model->slug])?>"><?= $model->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="blog-footer">
    <?= LinkPager::widget([
        'pagination' => $provider->getPagination(),
        'options' => [
            'class' => 'pagination justify-content-center',
        ],
        'linkContainerOptions'=>['class' => 'page-item'],
        'linkOptions'=> ['class' => 'page-link'],
        'activePageCssClass' => 'page-item active',
    ]) ?>
</div>