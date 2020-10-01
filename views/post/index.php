<?php
/* @var $this yii\web\View */
/* @var $searchModel \app\models\search\PostSearch */
/* @var $provider \yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
$models = $provider->getModels();
?>
<h1><?= $this->title ?></h1>

<div class="row">
    <?php foreach ($models as $model) : ?>
        <div class="col-md-4">
            <div class="post">
                <?php if($model->image !== null && $model->image !== '') :?>
                    <div class="post-image" style="background-image: url('<?= $model->getImgUrl(); ?>')"></div>
                <?php endif; ?>
                <div class="post-body">
                    <div class="post-meta">
                        <span class="post-date"><?= Yii::$app->formatter->asDatetime($model->created_at, $format = 'dd MMMM yyyy HH:mm') ?></span>
                    </div>
                    <h3 class="post-title"><a class="post__link" href="<?= Url::to(['post/view', 'slug' => $model->slug])?>"><?= $model->name ?></a></h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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