<?php

namespace frontend\models;

use Yii;
use common\models\ExtraItem;

/**
 * Class ExtraItemForm
 * 
 * @property string $formattedTotalPriceQuantity
 * @property string $formattedItemTitleInOrder
 */
class ExtraItemForm extends ExtraItem
{
    public $quantity = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity'], 'required'],
            ['id', 'integer'],
            ['quantity', 'integer', 'min' => 0]
        ];
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
}
