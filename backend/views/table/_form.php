<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model common\models\Table */
/* @var $form yii\widgets\ActiveForm */

$dispOptions = ['class' => 'form-control kv-monospace'];
 
$saveOptions = [
    // 'type' => 'text', 
    // 'label'=>'<label>Saved Value: </label>', 
    'class' => 'kv-saved',
    'readonly' => true, 
    'tabindex' => 1000
];
 
$saveCont = ['class' => 'kv-saved-cont'];
?>

<div class="table-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class='row'>
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->widget(NumberControl::class, [
                        'maskedInputOptions' => [
                            'prefix' => '$ ',
                            'allowMinus' => false,
                            'rightAlign' => false,
                        ],
                        'options' => $saveOptions,
                        'displayOptions' => $dispOptions,
                        'saveInputContainer' => $saveCont
                    ]);?>


            <?= $form->field($model, 'is_custom')->checkbox() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
