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
 * @property string $authKey
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['firstName', 'lastName', 'emailAddress', 'passWord', 'role'], 'required'],
            [['role'], 'string'],
            [['firstName', 'lastName', 'emailAddress'], 'string', 'max' => 100],
            [['passWord', 'authKey'], 'string', 'max' => 255],
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
            'role' => 'role',
            'authKey' => 'Auth Key',
        ];
    }

    //Custom methods
    public static function findIdentity($id){
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
    }

    public function getId(){
        return $this->userID;
    }

    public function getAuthKey(){
        return $this->authKey;//Here I return a value of my authKey column
    }

    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }
    public static function findByUsername($username){
        return self::findOne(['emailAddress'=>$username]);
    }

    public function validatePassword($password){
        return $this->passWord === $password;
    }

    public function getRole($role) {
        return self::findOne(['role'=>$role]);
    }

}
