<?php
/* @var $this yii\web\View */
/* @var $model app\models\Post */

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->postCategory->name, 'url' => ['category/view', 'category_slug' => $model->postCategory->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Page Header -->
<div id="post-header" class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-meta">
                    <span class="post-date"><?= Yii::$app->formatter->asDatetime($model->created_at, $format = 'dd MMMM yyyy HH:mm') ?></span>
                </div>
                <h1><?= $model->name ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-12">
                <div class="main-post">
                    <?php if($model->image !== null && $model->image !== '') :?>
                        <div class="text-center">
                            <img src="<?= $model->getImgUrl(); ?>" style="max-width: 100%;" />
                        </div>
                    <?php endif; ?>
                    <p><?= $model->description ?></p>
                </div>
            </div>
        </div>
    </div>
</div>