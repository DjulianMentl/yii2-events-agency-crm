<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */


$this->title = 'Edit Profile';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="section section-profile">
    <div class="section-container">
        <div class="profile-edit-wrapper">

            <div class="block-title">
                <?= $this->title ?>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'edit-profile', 'options' => ['class' => 'form-wrapper']]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'first_name')
                            ->textInput()
                            ->label('First Name') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'last_name')
                            ->textInput()
                            ->label('Last Name') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'city')
                            ->textInput()
                            ->label('City') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'address')
                            ->textInput()
                            ->label('Address') ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($user, 'phone')
                            ->textInput()
                            ->label('Phone') ?>
                    </div>
                </div>

                <div class="buttons">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-success', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>