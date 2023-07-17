<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var \common\models\Post[] $model */

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="section section-title section-blog-title">
    <div class="section-container">
        <?= Html::encode($this->title) ?>
    </div>
</div>

<div class="section section-content">
    <div class="section-container">
        <div class="section-title">
            Latest posts
        </div>

        <div class="section-text">
            <?php
                $count = count($model);
                $i = 1;
                foreach ($model as $post) : ?>

                    <div class="media">
                        <div class="media-body">
                            <a href="<?= \Yii::$app->urlManager->createUrl(['blog/view', 'id' => $post->id]) ?>">
                                <h4 class="media-heading"><?= Html::encode($post->title) ?></h4>
                            </a>
                            <h6><?= Html::encode($post->subtitle)?></h6>
                            <?= \yii\helpers\StringHelper::truncate(Html::encode($post->body), 500, '...') ?>
                        </div>
                    </div>

                    <?php if ($count != $i) : ?>
                        <hr>
                    
                    <?php endif; 
                    $i++; 
                endforeach;
            ?>
        </div>
    </div>
</div>