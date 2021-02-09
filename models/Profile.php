<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_Profile".
 *
 * @property integer $profileID
 * @property string $profileImagePath
 * @property integer $userID
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_Profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profileImagePath', 'userID'], 'required'],
            [['userID'], 'integer'],
            [['profileImagePath'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profileID' => 'Profile ID',
            'profileImagePath' => 'Profile Image Path',
            'userID' => 'User ID',
        ];
    }
}
