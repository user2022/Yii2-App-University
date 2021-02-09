<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_ApprovedStatus".
 *
 * @property integer $approvedStatusID
 * @property integer $approved
 */
class ApprovedStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_ApprovedStatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approved'], 'required'],
            [['approved'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'approvedStatusID' => 'Approved Status ID',
            'approved' => 'Approved',
        ];
    }
}
