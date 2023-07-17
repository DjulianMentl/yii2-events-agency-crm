<?php

/* @var $this \yii\web\View */
/* @var $title string */
/* @var $description string */

use yii\helpers\Html;

$this->title = $title;
?>

<div class="section section-title section-success-title">
    <div class="section-container">
        <?= Html::encode($title) ?>
    </div>
</div>

<div class="section section-success">
    <div class="section-container">
        <h2><?= Html::encode($description) ?></h2>
    </div>
</div>