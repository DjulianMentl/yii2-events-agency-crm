<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\db\Expression;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int $status
 * @property int $event_id
 * @property int $customer_id
 * @property string $event_date
 * @property string|null $transaction_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $event_name
 * @property string $ventDateLabel
 * @property float $totalPrice
 * @property string $totalPriceLabel
 * @property array $extraItems
 * @property float $extraItemsTotalPrice
 * @property string $extraItemsTotalPriceLabel
 * @property string $statusName
 *
 * @property User $customer
 * @property Table $table
 * @property Event $event
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_PAYMENT_PENDING = 0;
    const STATUS_PAYMENT_VERIFICATION_PENDING = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_COMPLETE = 3;

    public static $orderStatus = [
        self::STATUS_PAYMENT_PENDING => 'Payment Pending',
        self::STATUS_PAYMENT_VERIFICATION_PENDING => 'Payment Verification Pending',
        self::STATUS_PROCESSING => 'Processing Order',
        self::STATUS_COMPLETE => 'Complete'
    ];
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'event_id', 'customer_id', 'event_date'], 'required'],
            [['status', 'event_id', 'customer_id'], 'integer'],
            [['event_date', 'created_at', 'updated_at'], 'safe'],
            [['transaction_id'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'statusName' => 'Status',
            'event_id' => 'Event ID',
            'customer_id' => 'Customer ID',
            'event_date' => 'Event Date',
            'eventDateLabel' => 'Event Date',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'totalPriceLabel' => 'Price',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function getEvent_name(): string
    {
        return $this->event->name;
    }

    public function getTotalPrice(): float
    {
        $orderItems = $this->getOrderItems()->all();
        $totalPrice = 0;
    
        foreach ($orderItems as $orderItem) {
            $totalPrice += $orderItem->price * $orderItem->quantity;
        }
    
        return $totalPrice;
    }

    public function getTotalPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->totalPrice);
    }

    public function getTable(): Table
    {
        $orderItems = $this->getOrderItems()->andWhere(['not', ['table_id' => null]])->one();
  
        return Table::findOne(['id' => $orderItems->table_id]);
    }

    public function getEventDateLabel(): string
    {
        return Yii::$app->formatter->asDate($this->event_date);
    }

    public function getExtraItems(): array
    {
        return $this->getOrderItems()->andWhere(['not', ['extra_item_id' => null]])->all(); 
    }

    public function getExtraItemsTitle(): string
    {
        $maxItemsForTitle = 2;
        $extraItems = $this->extraItems;

        $extraItemFormsForTitle = array_slice($extraItems, 0, $maxItemsForTitle);

        $title = implode(', ', array_map(function(OrderItem $item) {
            return $item->quantity. ' ' .$item->title;
        }, $extraItemFormsForTitle));


        if (count($extraItems) > 2) {
            $title .= ', ...';
        }

        return $title;
    }

    public function getExtraItemsTotalPrice(): float
    {
        $totalPrice = 0;

        foreach ($this->extraItems as $extraItem) {
            $totalPrice += $extraItem->price * $extraItem->quantity;
        }

        return $totalPrice;
    }

    public function getExtraItemsTotalPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->extraItemsTotalPrice);
    }

    public function getStatusName(): string
    {
        return self::$orderStatus[$this->status];
    }
}
