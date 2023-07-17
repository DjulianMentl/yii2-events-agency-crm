<?php

namespace frontend\controllers;

use common\models\Event;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use yii\data\ActiveDataProvider;
use common\models\Order;
use common\models\Table;
use yii\helpers\VarDumper;

class ProfileController extends Controller
{
        /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['view', 'edit', 'order-details'],
                'rules' => [
                    [
                        'actions' => ['view', 'edit', 'order-details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionView()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;

        $orderDataProvider = new ActiveDataProvider();
        $orderDataProvider->query = Order::find()->where(['customer_id' => Yii::$app->user->id])->limit(20);
        $orderDataProvider->sort->defaultOrder = ['created_at' => SORT_DESC];
        $orderDataProvider->pagination = false;

        return $this->render('view', [
            'user' => $user,
            'orderDataProvider' => $orderDataProvider,
        ]);
    }

    public function actionEdit()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        $user->scenario = User::SCENARIO_PROFILE_EDIT;

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['profile/view']);
        }

        return $this->render('edit', [
            'user' => $user
        ]);
    }

    public function actionOrderDetails($id)
    {
        $model = Order::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->status = Order::STATUS_PAYMENT_VERIFICATION_PENDING;
            $model->save();
        }

        return $this->render('order-details', [
            'model' => $model,
        ]);
    }
}