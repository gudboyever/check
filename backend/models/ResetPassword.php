<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 */
class ResetPassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	public $confirm_password;
	
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password_hash', 'confirm_password'], 'required'],
            [['password_hash','confirm_password'], 'string', 'max' => 255],
			//['confirm_password', 'compare', 'compareAttribute'=>'password_hash', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password_hash' => 'Password',
            'confirm_password' => 'Confirm Password'
        ];
    }
}
