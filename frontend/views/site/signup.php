<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="section section-title section-signup-title">
        <div class="section-container">
            <?= Html::encode($this->title) ?>
        </div>
    </div>

    <div class="section section-signup">
        <div class="section-container">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'form-wrapper register-form']]); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Username'])
                    ->label(false) ?>

                <?= $form->field($model, 'email')
                    ->textInput(['placeholder' => 'Email'])
                    ->label(false) ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Password'])
                    ->label(false) ?>


                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'first_name')
                            ->textInput(['placeholder' => 'First Name'])
                            ->label(false) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'last_name')
                            ->textInput(['placeholder' => 'Last Name'])
                            ->label(false) ?>
                    </div>
                </div>

                <?= $form->field($model, 'address')
                    ->textInput(['placeholder' => 'Address'])
                    ->label(false) ?>

                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'city')
                            ->textInput(['placeholder' => 'City'])
                            ->label(false) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'phone')
                            ->textInput(['placeholder' => 'Phone'])
                            ->label(false) ?>
                    </div>
                </div>

                <div class="buttons">
                    <?= Html::submitButton('Sign Up', ['class' => 'btn btn-lg btn-success', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>