<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use frontend\models\EventOrderForm;
use common\models\Event;
use common\models\Table;
use frontend\components\PageMessageTrait;
use yii\helpers\VarDumper;

class EventController extends Controller
{
    use PageMessageTrait;

        /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['select-event'],
                'rules' => [
                    [
                        'actions' => ['select-event'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'select-event' => ['GET', 'POST'],
                    'number-of-tables' => ['POST'],
                    'select-date' => ['POST'],
                    'extra-items' => ['POST'],
                    'submit-order' => ['POST'],
                ],
            ],
        ];
    }

    public function actionSelectEvent()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_1_SELECT_EVENT;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->scenario = EventOrderForm::SCENARIO_STEP_2_NUMBER_OF_TABLES;

            return $this->render('step-2-number-of-tables', [
                'model' => $model,
                'tables' => Table::find()->all()
            ]);
        }

        return $this->render('step-1-select-event', [
            'model' => $model,
            'events' => Event::find()->all(),
        ]);
    }

    public function actionNumberOfTables()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_2_NUMBER_OF_TABLES;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            /** @var Table $table */
            $table = Table::find()->where(['id' => $model->tableId])->one();
            if ($table->is_custom) {
                return $this->redirect(['site/contact']);
            }

            $model->scenario = EventOrderForm::SCENARIO_STEP_3_SELECT_DATE;
            return $this->render('step-3-select-date', [
                'model' => $model,
            ]);
        }

        return $this->render('step-2-number-of-tables', [
            'model' => $model,
            'tables' => Table::find()->all(),
        ]);
    }

    public function actionSelectDate()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_3_SELECT_DATE;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->scenario = EventOrderForm::SCENARIO_STEP_4_EXTRA_ITEMS;

            return $this->render('step-4-extra-items', [
                'model' => $model,
            ]);
        }

        return $this->render('step-3-select-date', [
            'model' => $model,
        ]);
    }

    public function actionExtraItems()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_4_EXTRA_ITEMS;

        if (
            $model->load(Yii::$app->request->post()) &&
            EventOrderForm::loadMultiple($model->extraItemForms, Yii::$app->request->post()) &&
            EventOrderForm::validateMultiple($model->extraItemForms) &&
            $model->validate()
        ) {
            $model->scenario = EventOrderForm::SCENARIO_STEP_5_SUBMIT_ORDER;

            return $this->render('step-5-submit-order', [
                'model' => $model,
                'event' => Event::find()->where(['id' => $model->eventId])->one(),
            ]);
        }

        return $this->render('step-4-extra-items', [
            'model' => $model
        ]);
    }

    public function actionSubmitOrder()
    {
        $model = new EventOrderForm();
        $model->scenario = EventOrderForm::SCENARIO_STEP_5_SUBMIT_ORDER;

        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        if (
            $model->load(Yii::$app->request->post()) &&
            EventOrderForm::loadMultiple($model->extraItemForms, Yii::$app->request->post()) &&
            EventOrderForm::validateMultiple($model->extraItemForms) &&
            $model->validate()
        ) {
            $model->submit(Yii::$app->user->id);
            return $this->redirectToSuccessPage(
                'Order has been placed',
                'Your order has been placed. Please complete the payment transfer and enter the transaction code into the system, this can be done on your profile page.'
            );
        }

        return $this->render('step-5-submit-order', [
            'model' => $model,
            'event' => Event::find()->where(['id' => $model->eventId])->one(),
        ]);
    }
}