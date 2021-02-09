<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_TextCopy".
 *
 * @property integer $textCopyID
 * @property string $textCopy
 * @property string $title
 */
class TextCopy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_TextCopy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['textCopy', 'title'], 'required'],
            [['textCopy'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'textCopyID' => 'Text Copy ID',
            'textCopy' => 'Text Copy',
            'title' => 'Title',
        ];
    }
}
