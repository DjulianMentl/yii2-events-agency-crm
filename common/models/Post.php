<?php

namespace common\models;

use DateTime;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $body
 * @property string $created_at
 * @property string $readTimeLabel
 * @property string $subtitle
 * @property string $authorFullName
 *
 * @property User $author
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['author_id', 'default', 'value' => Yii::$app->user->ID],
            [['author_id', 'title', 'body'], 'required'],
            [['author_id'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
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
            'author_id' => 'Author ID',
            'title' => 'Title',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
    
    public function getReadTimeLabel()
    {
        $countWords = StringHelper::countWords($this->body);
        $timeRead = round($countWords / 265);

        if ($timeRead <= 1) {
            return 'about a minute read';
        }

        return $timeRead . ' min. read';
    }

    public function getSubtitle()
    {
        if (empty($this->author->first_name) && empty($this->author->last_name)) {
            return $this->author->username . ' · ' . (new DateTime($this->created_at))->format('d.m.Y')  . ' · ' . $this->readTimeLabel;
        }

        return $this->authorFullName . ' · ' . (new DateTime($this->created_at))->format('d.m.Y')  . ' · ' . $this->readTimeLabel;
    }

    public function getAuthorFullName()
    {
        return $this->author->first_name . ' ' . $this->author->last_name;
    }
}