<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%extra_item}}".
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $image
 * @property string $imageUrl
 * @property string $desktopWizardModalImageUrl
 * @property string $mobilepWizardModalImageUrl
 * @property string $wizardListImageUrl
 * @property string $description
 * @property string $priceLabel
 * 
 * @method getUploadUrl($attribute) - Returns file path for the attribute. @see \mohorev\file\UploadBehavior
 * @method getThumbUploadUrl($attribute, $profile = 'thumb') @see \mohorev\file\UploadImageBehavior
 */
class ExtraItem extends \yii\db\ActiveRecord
{
    const SCENARIO_INSERT = 'insert';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%extra_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],

            ['image', 'required', 'on' => self::SCENARIO_INSERT],
            
            [
                'image',
                'image',
                'extensions' => 'jpg, jpeg, png',
                 'on' => [self::SCENARIO_INSERT, self::SCENARIO_UPDATE]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => \mohorev\file\UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => [self::SCENARIO_INSERT, self::SCENARIO_UPDATE],
                'path' => '@frontend/web/upload/extra-item/{id}',
                'url' => '@frontendUrl/upload/extra-item/{id}',
                'thumbs' => [
                    'wizard-list' => ['width' => 240, 'height' => 282, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND],
                    'wizard-modal-desktop' => ['width' => 483, 'height' => 789, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND],
                    'wizard-modal-mobile' => ['width' => 600, 'height' => 483, 'mode' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND]
                ],
            ],
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
            'price' => 'Price',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getUploadUrl('image');
    }

    public function getWizardListImageUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-list');
    }

    public function getDesktopWizardModalImageUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-modal-desktop');
    }

    public function getMobilepWizardModalImageUrl()
    {
        return $this->getThumbUploadUrl('image', 'wizard-modal-mobile');
    }

    public function getPriceLabel()
    {
        return Yii::$app->formatter->asCurrency($this->price);
    }
}
