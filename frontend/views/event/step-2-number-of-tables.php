<?php

use common\models\Table;
use frontend\models\EventOrderForm;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var EventOrderForm $model */
/** @var Table[] $tables */

$js = <<<JS
function fillTableId(tableId) {
    $("#eventorderform-tableid").val(tableId)
}
JS;

$this->registerJs($js, View::POS_END);
?>

<?php $this->beginContent('@frontend/views/event/base.php', ['stepNumber' => $model->stepNumber]); ?>

    <ul class="tables-count-list">
        <?php foreach ($tables as $table): ?>
            <li onclick="fillTableId(<?= $table->id ?>)">
                <div class="inner">
                    <div class="num">
                        <?= $table->title ?>
                    </div>
                    <span><?= $table->subtitle ?></span>
                    <?= $table->is_custom ? Html::a('Contact Us', ['site/contact']) : null ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $form = ActiveForm::begin(['action' => '/event/number-of-tables']); ?>

        <?= $form->field($model, 'eventId')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'tableId')->hiddenInput()->label(false) ?>

        <div class="buttons">
            <?= Html::submitButton('Next', ['class' => "btn btn-lg btn-success"]); ?>
        </div>

    <?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>