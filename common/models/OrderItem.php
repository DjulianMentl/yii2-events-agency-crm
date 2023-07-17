<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_item}}".
 *
 * @property int $id
 * @property int $order_id
 * @property string $title
 * @property float $price
 * @property float $totalPrice
 * @property int $quantity
 * @property int|null $extra_item_id
 * @property int|null $table_id
 * @property string $formattedTotalPriceQuantity
 * @property string $formattedItemTitleInOrder
 * @property string $priceLabel
 * @property string $totalPriceLabel
 * @property string $orderItemType
 *
 * @property ExtraItem $extraItem
 * @property Order $order
 * @property Table $table
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'title', 'price', 'quantity'], 'required'],
            [['order_id', 'quantity', 'extra_item_id', 'table_id'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['extra_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExtraItem::className(), 'targetAttribute' => ['extra_item_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['table_id'], 'exist', 'skipOnError' => true, 'targetClass' => Table::className(), 'targetAttribute' => ['table_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'title' => 'Title',
            'price' => 'Price',
            'priceLabel' => 'Price',
            'totalPrice' => 'Total Price',
            'totalPriceLabel' => 'Total Price',
            'formattedTotalPriceQuantity' => 'Total Price',
            'quantity' => 'Quantity',
            'extra_item_id' => 'Extra Item ID',
            'table_id' => 'Table ID',
        ];
    }

    /**
     * Gets query for [[ExtraItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraItem()
    {
        return $this->hasOne(ExtraItem::className(), ['id' => 'extra_item_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(Table::className(), ['id' => 'table_id']);
    }

    public function getFormattedItemTitleInOrder(): string
    {
        return $this->title. ' (' .Yii::$app->formatter->asCurrency($this->price). ' x ' . $this->quantity. ')';
    }

    public function getFormattedTotalPriceQuantity(): string
    {
        $totalPriceQuantity = $this->price * $this->quantity;

        return Yii::$app->formatter->asCurrency($totalPriceQuantity);
    }

    public function getPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->price);
    }

    public function getOrderItemType(): string
    {
        return isset($this->table_id) ? 'Table' : 'Extra Item';
    }

    public function getTotalPrice(): float
    {
        return $this->price * $this->quantity;
    }

    public function getTotalPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->totalPrice);
    }
}
