<?php

/** @var $this yii\web\View  */
/** @var $stepNumber int The current wizard step  */
/** @var $content string  */

use yii\helpers\Html;

$this->title = "Events";
?>

<div class="section section-title section-events-title">
    <div class="section-container">
        <?= Html::encode($this->title) ?>
    </div>
</div>

<div class="section section-events">
    <div class="section-container">
        <div class="events-wrapper">
            <?php
                $steps = [
                    'Select Event',
                    'Number of tables',
                    'Select Date',
                    'Extra items',
                    'Submit Order',
                ];

                $renderItemFunc = function($value, $index) use($stepNumber) {

                    $itemClass = '';
                    if ($index + 1 < $stepNumber) {
                        $itemClass = 'pass';
                    } elseif ($index + 1 === $stepNumber) {
                        $itemClass = 'active';
                    }

                    $itemContent = Html::tag('div', $index + 1) . Html::tag('span', $value);

                    return Html::tag('li', $itemContent, ['class' => $itemClass]);
                };

                echo Html::ul($steps, [
                    'class' => "events-progress-bar step{$stepNumber}",
                    'encode' => false,
                    'item' => $renderItemFunc
                ]);
            ?>

            <?= $content ?>
        </div>
    </div>
</div>