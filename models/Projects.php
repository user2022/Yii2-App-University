<?php

namespace app\models;

use Yii;
use app\models\Media;
use app\models\TextCopy;

/**
 * This is the model class for table "EXPO2019_Projects".
 *
 * @property integer $projectID
 * @property integer $userID
 * @property integer $textCopyID
 * @property integer $mediaID
 * @property integer $approvedStatusID
 * @property integer $eventApprovalID
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_Projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'textCopyID', 'mediaID', 'approvedStatusID', 'eventApprovalID'], 'required'],
            [['userID', 'textCopyID', 'mediaID', 'approvedStatusID', 'eventApprovalID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectID' => 'Project ID',
            'userID' => 'User ID',
            'textCopyID' => 'Text Copy ID',
            'mediaID' => 'Media ID',
            'approvedStatusID' => 'Approved Status ID',
            'eventApprovalID' => 'Event Approval ID',
        ];
    }

    public function getProjects() {
        return $this->hasMany(Projects::className(), ['projectID' => 'projectID']);
    }

    public function getData() {
        return $this->hasMany(Media::className(), ['mediaID' => 'mediaID'])->via('projects');
    }

    public function getText() {
        return $this->hasMany(TextCopy::className(), ['textCopyID' => 'textCopyID'])->via('projects');
    }
}
