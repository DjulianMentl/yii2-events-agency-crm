<?php

use common\models\Event;
use frontend\models\EventOrderForm;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var EventOrderForm $model */
/** @var Event[] $events */

$js = <<<JS
function fillEventId(eventId) {
    $("#eventorderform-eventid").val(eventId)
}
JS;

$this->registerJs($js, View::POS_END);
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>

    <ul class="event-category-list">
        <?php foreach ($events as $event): ?>
            <li onclick="fillEventId(<?= $event->id ?>)">
                <div class="img">
                    <?= Html::img($event->imageUrl) ?>
                </div>
                <span><?= $event->name ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'eventId')->hiddenInput()->label(false) ?>

        <div class="buttons">
            <?= Html::submitButton('Next', ['class' => "btn btn-lg btn-success"]); ?>
        </div>

    <?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>