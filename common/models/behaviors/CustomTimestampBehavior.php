<?php

namespace common\models\behaviors;

use DateTime;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class CustomTimestampBehavior extends TimestampBehavior
{
    /**
     * @inheritdoc
     */
    protected function getValue($event)
    {
        if ($this->value === null) {
            return (new DateTime('now'))->format("Y-m-d H:i:s");
        }
        return parent::getValue($event);
    }
}