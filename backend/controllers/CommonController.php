<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CommonController extends Controller {	

	public $base_url = 'http://busappadmin.appinstitute.in/';
	public $upload_url = 'http://busappadmin.appinstitute.in/';
		
	public function init() {     
 
		$this->validateLogin();
  
	} 
 
	public function validateLogin()
	{
		if(Yii::$app->user->id == null || Yii::$app->user->id == 0)
		{
			$this->redirect(['/site/login']);
		}  
	}
	
	public function getUserId()
	{
		$userId = Yii::$app->user->id;
		
		return $userId;
	}
	
	public static function timeConversion()
	{
		date_default_timezone_set('Asia/Kolkata'); 
	
		$timestamp = time();
		return $date_time = date("Y-m-d h:i:s", $timestamp);
	}

	public static function generateToken($length = 100) 
	{		
		$timestampz=time();
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		$token = $timestampz*4 . $randomString;
		return $token;
	}

}
