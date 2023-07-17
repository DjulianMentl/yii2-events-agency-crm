<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\number\NumberControl;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\ExtraItem */
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

<div class="extra-item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Select Photo',
                    'initialPreview'=> $model->image ? $model->imageUrl : false,
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => $model->image ? [['caption' => $model->image]] : []
                ]
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
