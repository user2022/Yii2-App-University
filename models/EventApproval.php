<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_EventApproval".
 *
 * @property integer $eventApprovalID
 * @property integer $eventApproved
 */
class EventApproval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_EventApproval';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventApproved'], 'required'],
            [['eventApproved'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventApprovalID' => 'Event Approval ID',
            'eventApproved' => 'Event Approved',
        ];
    }
}
