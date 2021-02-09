<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_Media".
 *
 * @property integer $mediaID
 * @property string $mediaImagePath
 * @property integer $mediaType
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_Media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mediaImagePath', 'mediaType'], 'required'],
            [['mediaType'], 'integer'],
            [['mediaImagePath'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mediaID' => 'Media ID',
            'mediaImagePath' => 'Media Image Path',
            'mediaType' => 'Media Type',
        ];
    }
}
