<?php

use common\models\Post;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $model common\models\Post */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

// \yii\helpers\VarDumper::dump($dataProvider->getModels(), 10, 1); die();
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'authorFullName',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function(Post $model) {
                    return Html::a($model->title, \yii\helpers\Url::to(['view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'body',
                'format' => 'ntext',
                'value' => function(Post $model) {
                    return \yii\helpers\StringHelper::truncate($model->body, 200, '...');
                }
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
