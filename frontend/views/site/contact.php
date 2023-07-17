<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="section section-title section-contact-title">
        <div class="section-container">
            <?= Html::encode($this->title) ?>
        </div>
    </div>

    <div class="section section-contact">
        <div class="section-container">
            <div class="section-title">
                Let’s get in touch with us
            </div>
            <div class="section-description">
                We reply as fast as light do
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'options' => ['class' => "form-wrapper contact-form"],
                ]); ?>

                    <?= $form->field($model, 'name')->textInput(['placeholder' => "Full Name"])->label(false) ?>

                    <div class="row">
                        <div class="col-sm-7">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => "Email"])->label(false) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'subject')->textInput(['placeholder' => "Subject"])->label(false) ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'body')->textarea(['cols' => 30, 'rows' => 10, 'placeholder' => "Message"])->label(false) ?>

                    <div class="buttons">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-lg btn-success', 'name' => 'contact-button']) ?>
                    </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
