<?php

use common\models\Order;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$extraItemsDataProvider = new ArrayDataProvider([
    'allModels' => $model->extraItems,
    'pagination' => false,
]);
?>

<div class="row">
    <div class="col-md-4">
        <h4><?= $model->event_name ?></h4>
        <p><?= Html::img($model->event->imageUrl, ['height' => 100]) ?></p>
        <strong>Table: </strong><?= $model->table->fullTitle ?>
        <br>
        <strong>Price: </strong><?= $model->totalPriceLabel ?>
        <br>
        <strong>Transaction ID: </strong><?= $model->transaction_id ?? 'Not enter yet' ?>
    </div>
    <div class="col-md-8">
    <h4>Extra Item</h4>
        <?= GridView::widget([
            'dataProvider' => $extraItemsDataProvider,
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'extraItem.imageUrl',
                    'label' => false,
                    'format' => ['image', ['height' => 50]],
                    'options' => ['width' => 60],
                ],
                'title',
                'priceLabel',
                'quantity',
                'formattedTotalPriceQuantity',
            ],
        ]); ?>
    </div>
</div>