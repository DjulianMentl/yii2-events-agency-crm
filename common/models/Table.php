<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%table}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property float $price
 * @property boolean $is_custom
 * 
 * @property string $fullTitle
 * @property string $priceLabel
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['price'], 'number'],
            [['is_custom'], 'boolean'],
            [['title', 'subtitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'price' => 'Price',
            'is_custom' => 'Is Custom',
        ];
    }

    public function getFullTitle(): string
    {
        return $this->title. ' ' .$this->subtitle;
    }

    public function getPriceLabel(): string
    {
        return Yii::$app->formatter->asCurrency($this->price);
    }
}
