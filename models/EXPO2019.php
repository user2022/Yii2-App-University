<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_Users".
 *
 * @property integer $userID
 * @property string $firstName
 * @property string $lastName
 * @property string $emailAddress
 * @property string $passWord
 * @property integer $userType
 */
class EXPO2019 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'emailAddress', 'passWord', 'userType'], 'required'],
            [['userType'], 'integer'],
            [['firstName', 'lastName', 'emailAddress'], 'string', 'max' => 100],
            [['passWord'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => 'User ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'emailAddress' => 'Email Address',
            'passWord' => 'Pass Word',
            'userType' => 'User Type',
        ];
    }
}
