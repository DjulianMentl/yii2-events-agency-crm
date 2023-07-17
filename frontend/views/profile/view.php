<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\SerialColumn;

/** @var yii\web\View $this */
/** @var $orderDataProvider \yii\data\ActiveDataProvider */


$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section section-profile">
    <div class="section-container">
        <div class="profile-block">
            <a class="btn btn btn-view pull-right" href="<?= Url::to(['profile/edit']) ?>">Edit Profile</a>
            <div class="block-title">User Detail</div>

            <ul class="user-details">
                <li><span>Name:</span> <?= $user->first_name . ' ' . $user->last_name ?></li>
                <li><span>Address:</span> <?= $user->address . ', ' . $user->city ?></li>
                <li><span>Phone:</span> <?= $user->phone ?></li>
                <li><span>Email:</span> <?= $user->email ?></li>
            </ul>
        </div>

        <div class="profile-block">

            <div class="block-title">Purchase History</div>

            <?= GridView::widget([
                    'dataProvider' =>$orderDataProvider,
                    // 'caption' => 'Purchase History',
                    // 'captionOptions' => ['class' => 'block-title'],
                    'layout' => "{items}",
                    'options' => ['class' => 'grid-view'],
                    'tableOptions' => ['class' => 'table table-striped table-history'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No.',
                        ],
                        [
                            'attribute' =>'event_name',
                            'label' => 'Item',
                        ],
                        [
                            'attribute' =>'created_at',
                            'label' => 'Date',
                            'format' => 'date',
                        ],
                        [
                            'attribute' =>'totalPrice',
                            'label' => 'Price',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' =>'status',
                            'label' => false,
                            'format' => 'raw',
                            'value' => function(Order $dataProvider) {
                                $status = $dataProvider->status;
                                $class = '';

                                switch ($status) {
                                    case Order::STATUS_PAYMENT_PENDING:
                                    case Order::STATUS_PAYMENT_VERIFICATION_PENDING:
                                        $class = "purchase-status pending";
                                        break;
                                    case Order::STATUS_PROCESSING:
                                        $class = "purchase-status processing";
                                        break;
                                    case Order::STATUS_COMPLETE:
                                        $class = "purchase-status complete";
                                        break;
                                }

                                return Html::tag('div', $dataProvider::$orderStatus[$status], ['class' => $class]);
                            }
                        ],
                        [
                            'attribute' => 'btnView',
                            'label' => false,
                            'format' => 'raw',
                            'value' => function(Order $dataProvider) {
                                return Html::a('View', ['order-details', 'id' => $dataProvider->id], ['class' => 'btn-view']);
                            }
                        ],
                    ],
                ]); ?>
        </div>
    </div>
</div>