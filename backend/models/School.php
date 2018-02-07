<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $Id
 * @property string $SchoolName
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $Email
 * @property string $Phone
 * @property string $Website
 * @property string $Address
 * @property string $State
 * @property string $Country
 * @property string $PinCode
 * @property string $LogoImgURL
 * @property integer $Status
 * @property string $CreatedDate
 * @property string $UpdatedDate
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['username','SchoolName', 'auth_key', 'password_hash', 'Email', 'Phone', 'Website', 'Address', 'State', 'Country', 'PinCode', 'Description','Latitude', 'Longitude', 'CreatedDate', 'UpdatedDate', 'Status'], 'required'],
            [['Status'], 'integer'],
            [['CreatedDate', 'UpdatedDate','Location'], 'safe'],
            [['SchoolName', 'password_hash', 'password_reset_token', 'Address', 'LogoImgURL'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['Email', 'Website', 'State', 'Country', 'PinCode'], 'string', 'max' => 100],
            ['Email', 'email'],
            [['Email','Phone','username','Website'],'unique'],
            //['Latitude', 'match', 'pattern' => '/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/', 'message' => yii::t('app', 'Enter Valid Latitude.')],
            //['Longitude', 'match', 'pattern' => '/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/', 'message' => yii::t('app', 'Enter Valid Longitude.')],
            ['LogoImgURL', 'image', 'minWidth' => 500, 'maxWidth' => 500,'minHeight' => 500, 'maxHeight' => 500],
            [['Phone'], 'string', 'max' => 10, 'min' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'username' => 'User Name',
            'SchoolName' => 'School Name',
            'Description' => 'Description',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'Email' => 'Email',
            'Phone' => 'Phone',
            'Website' => 'Website',
            'Address' => 'Address',
            'State' => 'State',
            'Country' => 'Country',
            'PinCode' => 'PinCode',
            'LogoImgURL' => 'Logo Img Url',
            'Latitude' => 'Latitude',
            'Longitude' => 'Longitude',
            'Status' => 'Status',
            'CreatedDate' => 'Created Date',
            'UpdatedDate' => 'Updated Date',
        ];
    }
}
