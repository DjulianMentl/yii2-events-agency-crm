<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\assets\ResetAsset;
use frontend\controllers\BlogController;
use frontend\controllers\EventController;
use frontend\controllers\ProfileController;
use yii\widgets\Menu;

ResetAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerCsrfMetaTags() ?>

        <link rel="apple-touch-icon" sizes="180x180" href="/themes/main/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/themes/main/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/themes/main/images/favicons/favicon-16x16.png">
        <link rel="manifest" href="/themes/main/images/favicons/site.webmanifest">
        <link rel="mask-icon" href="/themes/main/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <?php $this->head() ?>
    </head>

    <?php if (get_class(Yii::$app->controller) === ProfileController::class): ?>
        <body class=" profile-page">
    <?php else: ?>
        <body>
    <?php endif; ?>

    <?php $this->beginBody() ?>

        <div id="wrapper">

            <div id="header">
                <div class="header-content">
                    <a href="#mainnavMenu" class="mainnav-button"></a>
                    <?php
                        $menuBar = [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            [
                                'label' => 'Events',
                                 'url' => '/event/select-event',
                                 'active' => get_class(Yii::$app->controller) === EventController::class,
                            ],
                            [
                                'label' => 'Blog',
                                'url' => ['/blog/index'],
                                'active' => get_class(Yii::$app->controller) === BlogController::class,
                            ],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact', 'url' => ['/site/contact']],
                        ];
                        if (Yii::$app->user->isGuest) {
                            $userBar[] = ['label' => 'Sign In', 'url' => ['/site/login']];
                            $userBar[] = ['label' => 'Sign Up', 'url' => ['/site/signup']];
                            $userBarClass = 'user-bar';
                        } else {
                            $userBar[] = ['label' => 'My Account', 'url' => '/profile/view'];

                            $logoutBtn = Html::beginForm(['/site/logout'], 'post')
                                 . Html::a('Logout <i class="fa fa-sign-out"></i>', '#', ['onclick' => 'this.parentNode.submit()'])
                                 . Html::endForm();
                            $userBar[] = ['label' => $logoutBtn, 'encode' => false];     
                            $userBarClass = 'user-bar profile';
                        }

                        echo Menu::widget([
                            'options' => ['class' => 'mainnav', 'id' => "mainnavMenu"],
                            'items' => $menuBar,
                        ]);
                        
                        echo Menu::widget([
                            'options' => ['class' => $userBarClass],
                            'items' => $userBar,
                        ]);
                    ?>
                </div>
            </div>

            <div id="container">
                <?= $content ?>
            </div>
        </div>

        <div id="footer">
            <div class="footer-content">
                <div class="copyright">
                    &copy; <?= date('Y') ?>
                </div>

                
                <?= Menu::widget([
                        'options' => ['class' => 'mainnav'],
                        'items' => $menuBar,
                        'activeCssClass' => null,
                ]); ?>
                
            </div>
        </div>

    <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
