<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $model \frontend\models\EventOrderForm */
/** @var $event \common\models\Event */
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>
    <?php $form = ActiveForm::begin(['action' => '/event/submit-order']); ?>
        <div class="submit-order-wrapper">
            <div class="block-title">
                Your Order Detail
            </div>

            <ul class="order-details">
                <li>
                    <div class="inner">
                        <div class="order-item">
                            <div class="order-item-inner">
                                <span>Events Name:</span> <?= $event->name ?>
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
                <?php if (!empty($model->nonZeroQuantityExtraItemForms)) : ?>
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
                                <?php foreach ($model->nonZeroQuantityExtraItemForms as $index => $extraItemForm) : ?>
                                        <li>
                                            <?= $form->field($extraItemForm, "[{$index}]id")->hiddenInput()->label(false) ?>
                                            <?= $form->field($extraItemForm, "[{$index}]quantity")->hiddenInput()->label(false) ?>

                                            <div class="order-item">
                                                <div class="order-item-inner">
                                                    <?= $extraItemForm->formattedItemTitleInOrder ?>    
                                                </div>
                                            </div>
                                            <div class="order-item-price">
                                                <?= $extraItemForm->formattedTotalPriceQuantity ?>
                                            </div>
                                        </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <?php else : ?>
                        <?php foreach ($model->extraItemForms as $index => $extraItemForm) : ?>
                            <?= $form->field($extraItemForm, "[{$index}]id")->hiddenInput()->label(false) ?>
                            <?= $form->field($extraItemForm, "[{$index}]quantity")->hiddenInput()->label(false) ?>
                        <?php endforeach; ?>
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

            <?= $form->field($model, 'eventId')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'tableId')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'eventDate')->hiddenInput()->label(false) ?>
            
            <div class="buttons">
                <?= Html::submitButton('Submit Order', ['class' => "btn btn-lg btn-success"]); ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>