<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ForgotPassword".
 *
 * @property integer $Id
 * @property integer $UserId
 * @property string $Email
 * @property string $Token
 * @property integer $ExpiryStatus
 * @property integer $ResetType
 * @property integer $UserType
 * @property string $CreatedDate
 */
class ForgotPassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ForgotPassword';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'Email', 'Token', 'ExpiryStatus', 'ResetType', 'UserType', 'CreatedDate'], 'required'],
            [['UserId', 'ExpiryStatus', 'ResetType', 'UserType'], 'integer'],
            [['CreatedDate'], 'safe'],
            [['Email'], 'string', 'max' => 50],
            [['Token'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'UserId' => 'User ID',
            'Email' => 'Email',
            'Token' => 'Token',
            'ExpiryStatus' => 'Expiry Status',
            'ResetType' => 'Reset Type',
            'UserType' => 'User Type',
            'CreatedDate' => 'Created Date',
        ];
    }
}
