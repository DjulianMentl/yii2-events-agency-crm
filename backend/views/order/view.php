<?php

use common\models\Order;
use common\models\OrderItem;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Expression;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $orderItemsDataProvider \yii\data\ActiveDataProvider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="order-view">

    <div class="row">
        <div class="col-md-6">
            <h2><?= $model->event_name ?></h2>

            <?php $form = ActiveForm::begin() ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'customer.fullName',
                        'totalPriceLabel',
                        [
                            'attribute' => 'statusName',
                            'format' => 'raw',
                            'value' => function(Order $model) {
                                $selectOptions = Order::$orderStatus;

                                $select = Html::tag('select', Html::renderSelectOptions($model->status, $selectOptions), [
                                    'id' => 'order-status',
                                    'name' => 'Order[status]',
                                    'class' => 'form-control'
                                ]);

                                return Html::tag('div', $select, ['class' => 'form-group field-order-status required has-success']);
                            },
                        ],
                        'event_date:date',
                        [
                            'attribute' => 'transaction_id',
                            'value' => $model->transaction_id ?? 'Not enter yet',
                        ],
                        'created_at:datetime',
                    ],
                ]) ?>

                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-6">
            <h2><?= $model->customer->fullName ?></h2>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'customer.id',
                    'customer.first_name',
                    'customer.last_name',
                    'customer.phone',
                    'customer.email',
                    'customer.city',
                    'customer.address',
                    'customer.created_at:datetime',
                ],
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= GridView::widget([
                'dataProvider' => $orderItemsDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'orderItemType',
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function(OrderItem $model) {
                            $urlOrderItem = $model->table_id ? 'table/view' : 'extra-item/view';
                            $idOrderItem = $model->table_id ?? $model->extra_item_id;

                            return Html::a($model->title, Url::to([$urlOrderItem, 'id' => $idOrderItem]));
                        },
                    ],
                    'priceLabel',
                    'quantity',
                    'totalPriceLabel',
                    [
                        'attribute' => 'extraItem.imageUrl',
                        'label' => 'Image',
                        'format' => ['image', ['height' => 50]],
                        'options' => ['width' => 60],
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
