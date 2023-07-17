<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="section section-title section-signin-title">
    <div class="section-container">
        <?= Html::encode($this->title) ?>
    </div>
</div>


<div class="section section-signin">
    <div class="section-container">
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-wrapper login-form']]); ?>

            <?= $form->field($model, 'username')
                ->textInput(['autofocus' => true, 'placeholder' => 'Username'])
                ->label(false) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['placeholder' => 'Password'])
                ->label(false) ?>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'rememberMe')
                    ->checkbox()
                    ->label('Keep me Sign In') ?>
                </div>
            </div>

            <div class="buttons">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-lg btn-success', 'name' => 'login-button']) ?>
            </div>

            <div class="reg-link">Didn't have an account yet? <?= Html::a('Register Here', ['site/signup']) ?></div>

        <?php ActiveForm::end(); ?>

    </div>
</div>