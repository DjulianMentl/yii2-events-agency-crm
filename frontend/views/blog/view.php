<?php

use yii\helpers\Html;

/** @var \common\models\Post $model */

$this->params['breadcrumbs']['blog'] = $model->title;

?>

<div class="section section-content">
    <div class="section-container">
        <div class="section-title">
            <?= Html::encode($model->title) ?>
        </div>

        <div class="section-text">
            <h5><?= Html::encode($model->subtitle)?></h5>
            <?= Html::encode($model->body) ?>
        </div>
    </div>
</div>
