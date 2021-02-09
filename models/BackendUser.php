<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EXPO2019_backend_user".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $role
 */
class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EXPO2019_backend_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'password', 'authKey', 'role'], 'required'],
            [['firstName', 'lastName', 'username', 'password', 'authKey', 'role'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'role' => 'Role',
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
	      return $this->id;
	    }

	    public function getAuthKey(){
	      return $this->authKey;//Here I return a value of my authKey column
	    }

	    public function validateAuthKey($authKey){
	      return $this->authKey === $authKey;
	    }
	    public static function findByUsername($username){
	      return self::findOne(['username'=>$username]);
	    }

	    public function validatePassword($password){
	      return $this->password === $password;
	    }
}
