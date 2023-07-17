<?php

namespace frontend\models;

use common\models\Event;
use common\models\Order;
use common\models\OrderItem;
use common\models\Table;
use DateTime;
use Exception;
use LogicException;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Class EventOrderForm
 * 
 * @property int $stepNumber
 * @property Table $table
 * @property ExtraItemForm[] $nonZeroQuantityExtraItemForms
 * @property string $extraItemsTitle
 * @property float $extraItemsTotalPrice
 * @property string $extraItemsTotalPriceLabel
 * @property float $totalPrice
 * @property string $totalPriceLabel
 * @property string $eventDateLabel
 */
class EventOrderForm extends Model
{
    /**
     * @var int
     */
    public $eventId;

    /**
     * @var int
     */
    public $tableId;

    /**
     * @var string
     */
    public $eventDate;

    /**
     * @var ExtraItemForm[]
     */
    public $extraItemForms;

    const SCENARIO_STEP_1_SELECT_EVENT = 'select-event';
    const SCENARIO_STEP_2_NUMBER_OF_TABLES = 'number-of-tables';
    const SCENARIO_STEP_3_SELECT_DATE = 'select-date';
    const SCENARIO_STEP_4_EXTRA_ITEMS = 'extra-items';
    const SCENARIO_STEP_5_SUBMIT_ORDER = 'submit-order';

    /**
     * {@inheritdoc}
     */
    public function __construct($config = ['scenario' => self::SCENARIO_STEP_1_SELECT_EVENT])
    {
        parent::__construct($config);
        $this->extraItemForms = ExtraItemForm::find()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['eventId', 'required', 'message' => 'Please, choose event.'],
            ['eventId', 'integer'],
            ['eventId', 'exist', 'skipOnError' => true, 'targetClass' => Event::class, 'targetAttribute' => ['eventId' => 'id']],

            ['tableId', 'required', 'message' => 'Please, choose one of the types of tables.'],
            ['tableId', 'integer'],
            ['tableId', 'exist', 'skipOnError' => true, 'targetClass' => Table::class, 'targetAttribute' => ['tableId' => 'id']],


            ['eventDate', 'required', 'message' => 'Please, choose event date.'],
            ['eventDate', 'date', 'format' => 'php:Y-m-d', 'min' => date('Y-m-d', strtotime('+3 days'))],

            ['extraItemForms', 'required'],
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            static::SCENARIO_STEP_1_SELECT_EVENT => ['eventId'],
            static::SCENARIO_STEP_2_NUMBER_OF_TABLES => ['eventId', 'tableId'],
            static::SCENARIO_STEP_3_SELECT_DATE => ['eventId', 'tableId', 'eventDate'],
            static::SCENARIO_STEP_4_EXTRA_ITEMS => ['eventId', 'tableId', 'eventDate', 'extraItemForms'],
            static::SCENARIO_STEP_5_SUBMIT_ORDER => ['eventId', 'tableId', 'eventDate', 'extraItemForms'],
        ];
    }

    public function getStepNumber(): int
    {
        $result = array_search($this->scenario, array_keys($this->scenarios()));

        if ($result === false) {
            return 1;
        }

        return $result + 1;
    }

    /**
     * @throws Exception
     */
    public function getTable(): Table
    {
        $model = Table::findOne($this->tableId);

        if (!empty($model)) {
            return $model;
        }

        throw new Exception("Table with id = '{$this->tableId}' was not found");
    }

    /**
     * @return ExtraItemForm[]
     */
    public function getNonZeroQuantityExtraItemForms(): array
    {
        // if (!is_array($this->extraItemForms))
        // return [];

        $nonZeroQuantityExtraItemForms = array_filter($this->extraItemForms, function(ExtraItemForm $item) {
            return $item->quantity > 0;
        });

        return $nonZeroQuantityExtraItemForms;
    }

    public function getExtraItemsTitle(): string
    {
        $maxItemsForTitle = 2;
        $extraItemForms = $this->nonZeroQuantityExtraItemForms;

        $extraItemFormsForTitle = array_slice($extraItemForms, 0, $maxItemsForTitle);

        $title = implode(', ', array_map(function(ExtraItemForm $item) {
            return $item->quantity. ' ' .$item->title;
        }, $extraItemFormsForTitle));


        if (count($extraItemForms) > 2) {
            $title .= ', ...';
        }

        return $title;
    }

    public function getExtraItemsTotalPrice(): float
    {
        $extraItemForms = $this->nonZeroQuantityExtraItemForms;
        $totalPrice = 0;

        foreach ($extraItemForms as $extraItemForm) {
            $totalPrice += $extraItemForm->price * $extraItemForm->quantity;
        }

        return $totalPrice;
    }

    public function getExtraItemsTotalPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->extraItemsTotalPrice);
    }

    public function getTotalPrice(): float
    {
        return $this->table->price + $this->extraItemsTotalPrice;
    }

    public function getTotalPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->totalPrice);
    }

    public function getEventDateLabel(): string
    {
        return Yii::$app->formatter->asDate($this->eventDate);
    }

    public function submit($customerId)
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $order = new Order();
            $order->status = Order::STATUS_PAYMENT_PENDING;
            $order->event_id = $this->eventId;
            $order->customer_id = $customerId;
            $order->event_date = $this->eventDate;

            if (!$order->save()) {
                Yii::error($order->getErrors());
                throw new LogicException("Internal error");
            }

            foreach ($this->nonZeroQuantityExtraItemForms as $extraItemForm) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->title = $extraItemForm->title;
                $orderItem->price = $extraItemForm->price;
                $orderItem->quantity = $extraItemForm->quantity;
                $orderItem->extra_item_id = $extraItemForm->id;

                if (!$orderItem->save()) {
                    Yii::error($orderItem->getErrors());
                    throw new LogicException("Internal error");
                }
            }

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->title = $this->table->fullTitle;
            $orderItem->price = $this->table->price;
            $orderItem->quantity = 1;
            $orderItem->table_id = $this->tableId;

            if (!$orderItem->save()) {
                Yii::error($orderItem->getErrors());
                throw new LogicException("Internal error");
            }

            $transaction->commit();

        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
