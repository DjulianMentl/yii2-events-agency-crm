<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $model \common\models\Order */
/** @var $orderItems \common\models\OrderItem[] */

$this->title = "Purchase History Detail";
?>

<div class="section section-profile">
    <div class="section-container">
        <div class="submit-order-wrapper">
            <div class="block-title">
                Your History Order Detail
            </div>

            <ul class="order-details">
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner"><span>Transaction ID:</span> <?= $model->transaction_id ?? 'Not enter yet' ?></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Events Name:</span> <?= $model->event_name ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Number of Tables:</span> <?= $model->table->fullTitle ?></div>
                        </div>
                        <div class="order-item-price">
                            <?= $model->table->priceLabel ?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Date:</span> <?= $model->eventDateLabel ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php if (!empty($model->extraItems)) : ?>
                    <li>
                        <div class="inner extended">
                            <div class="order-item">
                                <div class="order-item-inner"><span>Extra Items:</span> <?= $model->extraItemsTitle ?></div>
                            </div>
                            <div class="order-item-price">
                                <?= $model->extraItemsTotalPriceLabel ?>
                            </div>
                        </div>

                        <div class="extend">
                            <ul>
                                <?php foreach ($model->extraItems as $orderExtraItem) : ?>
                                        <li>
                                            <div class="order-item">
                                                <div class="order-item-inner">
                                                    <?= $orderExtraItem->formattedItemTitleInOrder ?>    
                                                </div>
                                            </div>
                                            <div class="order-item-price">
                                                <?= $orderExtraItem->formattedTotalPriceQuantity ?>
                                            </div>
                                        </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                <li class="total">
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                Total
                            </div>
                        </div>
                        <div class="order-item-price">
                            <?= $model->totalPriceLabel ?>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="list-controls">
                <?= Html::a('Back to Profile', 'view') ?>
            </div>

            <?php if (!isset($model->transaction_id)) : ?>
                <div class="buttons">
                    <?= Html::a(
                            'Submit Transaction ID', '#', 
                            [
                                'class' => "btn btn-lg btn-success",
                                'data-toggle' => "modal",
                                'data-target' => "#historyDetailMessage"
                            ]
                        ); ?>
                </div>`
            <?php endif; ?>
        </div>
    </div>
</div>

    <div class="modal fade" tabindex="-1" role="dialog" id="historyDetailMessage">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="close-modal" data-dismiss="modal" aria-label="Close"></a>
                <div class="modal-header">
                    <h4 class="modal-title">Enter Transaction ID</h4>
                </div>
                <div class="modal-body">
                    <div class="transaction-id-form">
                        <?php $form = ActiveForm::begin(['action' => '/profile/order-details?id=' . "{$model->id}"]); ?>
                            
                            <?= $form->field($model, 'transaction_id')->textInput(['placeholder' => "Transaction ID"])->label(false); ?>

                            <div class="buttons">
                                <?= Html::submitButton('Submit', ['class' => "btn btn-md btn-success"]) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->