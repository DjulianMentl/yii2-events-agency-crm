<?php

use common\models\Order;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;

// VarDumper::dump($dataProvider, 10, 1); die();
?>

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    <?= \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => \kartik\grid\ExpandRowColumn::class,
            'format' => 'html',
            'value' => function ($model, $key, $index, $column) {
                return \kartik\grid\GridView::ROW_COLLAPSED;
            },
            'detail' => function (Order $model, $key, $index, $column) {
                /** @var \yii\web\View $this */

                return $this->renderFile('@backend/views/order/_expanded-table-row.php', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true,
            'expandIcon' => '<i class="glyphicon glyphicon-menu-right"></i>',
            'collapseIcon' => '<i class="glyphicon glyphicon-menu-down"></i>'
        ],
        [
        'attribute' => 'id',
        ],

        [
            'attribute' => 'event_name',
            'label' => 'Event',
            'format' => 'raw',
            'value' => function(Order $model) {
                return Html::a($model->event_name, Url::to(['view', 'id' => $model->id]));
            },
        ],

        [
            'attribute' => 'customer.fullName',
            'filter' => Html::activeDropDownList($searchModel, 'customer_id', $searchModel->customersList, ['prompt' => 'All', 'class' => 'form-control'])
        ],

        'totalPriceLabel',

        [
            'attribute' => 'statusName',
            'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList, ['prompt' => 'All', 'class' => 'form-control']),
        ],

        [
            'attribute' => 'eventDateLabel',
            'filter' => kartik\daterange\DateRangePicker::widget([
                'model' => $searchModel,
                'attribute' => 'eventDateRange',
                'convertFormat' => true,
                'startAttribute' => 'eventDateStart',
                'endAttribute' => 'eventDateEnd',
                'pluginOptions' => [
                    'locale' => ['format' => 'Y-m-d'],
                ],
                'options' => [
                    'placeholder' => 'Select range...',
                    'class' => 'form-control'
                ]
            ]),
            'options' => [
                'width' => 220,
            ]
        ],

        [
            'attribute' => 'created_at',
            'filter' => false,
            'format' => 'datetime',
        ],
    ],
]); ?>



</div>
