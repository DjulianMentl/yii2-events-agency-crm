<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TextBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Text Blocks';
$this->params['breadcrumbs'][] = $this->title;

// VarDumper::dump($dataProvider,10, 1); die();
?>
<div class="text-block-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Text Block', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shortcut',
            'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>