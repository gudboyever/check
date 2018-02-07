<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\SuperAdminLoginForm;
use backend\models\SuperAdmin;
use backend\models\SuperAdmin as SuperAdminModel;
use backend\models\ForgotPassword;
use backend\models\ResetPassword;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
		'rules' => [
                    [
                        'actions' => ['login', 'error','forgotpassword','resetforgotpassword'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['changepassword', 'resetpassword','sample'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'LoginLayout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SuperAdminLoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangepassword()
    {
        return $this->render('changepassword');
    }

    public function actionResetpassword($newPassword,$oldPassword)

	{
        $resetModel = SuperAdmin::find()->where(['id' => Yii::$app->user->id])->one();

	if(count($resetModel) > 0)
	{

		if(Yii::$app->getSecurity()->validatePassword($oldPassword,$resetModel->password_hash))

		{
                $resetModel->password_hash = Yii::$app->getSecurity()->generatePasswordHash($newPassword);
                if($resetModel->save())
                {
                    return 1;
                }
                else
                {
                    return 3;
                }  
            }

	else
            {
                return 2;
            }
        }
    }

	public function actionForgotpassword()
	{
		try
		{	
			$this->layout = 'LoginLayout'; 
			
			$model = new SuperAdminModel();
			
			if ($model->load(Yii::$app->request->post())) 
			{
				$ValidateMail = SuperAdminModel::find()->where(['email' => $model->email, 'status' => 1])->one();
							
				$base_url = "http://busappadmin.appinstitute.in/";
			
				if(count($ValidateMail) == 1)
				{
					$checkExistingToken = ForgotPassword::find()->where(['UserId' => $ValidateMail->id, 'ExpiryStatus' => 0, 'ResetType' => 1, 'UserType' => 1])->one();
							
					if(count($checkExistingToken) == 0)
					{
						$NewForgotPasswordToken = new ForgotPassword();
						
						$NewForgotPasswordToken->UserId = $ValidateMail->id;
						$NewForgotPasswordToken->Email = $model->email;
						$NewForgotPasswordToken->Token = CommonController::generateToken();
						$NewForgotPasswordToken->ExpiryStatus = 0;
						$NewForgotPasswordToken->ResetType = 1;
						$NewForgotPasswordToken->UserType = 1;
						$NewForgotPasswordToken->CreatedDate = date('Y-m-d H:i:s');
						
						if($NewForgotPasswordToken->save())
						{
							$mail = Yii::$app->mail->compose()
										->setFrom(['customercare@nshoppy.in'])
										->setTo($ValidateMail->email)
										->setHtmlBody('<b>Set Your New Password URL:</b><p>'. $base_url .'site/resetforgotpassword?Token='.$NewForgotPasswordToken->Token .'</p>')
										->setSubject('Bus Tracking Forgot Password' )
										->send();
							
							if($mail)			
							{
								Yii::$app->session->setFlash('mailerror', null);	
								Yii::$app->session->setFlash('mailsuccess', "New Url sent to your Mail Address");	
								return $this->render('forgotpassword', [
											'model' => $model,
										]);
							}
							else
							{
								Yii::$app->session->setFlash('mailerror', "Something Went Wrong !");		
								return $this->render('forgotpassword', [
										'model' => $model,
									]);
							}
						}
						else 
						{
							Yii::$app->session->setFlash('mailerror', "Something Went Wrong !");	
							return $this->render('forgotpassword', [
								'model' => $model,
							]);
						}
					}
					else 
					{
						Yii::$app->session->setFlash('mailerror', null);	
						Yii::$app->session->setFlash('mailsuccess', "Already Url sent to your Mail Address");
						return $this->render('forgotpassword', [
								'model' => $model,
							]);	
					}	
				}
				else 
				{
					$session = Yii::$app->session;
						
					Yii::$app->session->setFlash('mailerror', "Mail Id Not Found");	
				
					return $this->render('forgotpassword', [
						'model' => $model,
					]);
				}
				return $this->render('forgotpassword', [
									'model' => $model,
								]);
			} 
			else 
			{
				return $this->render('forgotpassword', [
					'model' => $model,
				]);
			}
		}
		catch(Exception $e)
		{
			throw new \yii\base\Exception($e->getMessage());	
		}	
	}
	
	public function actionResetforgotpassword()
    {
		try
		{	
			$this->layout = 'LoginLayout'; 
			
			$model = new ResetPassword();
			
			$Token = Yii::$app->getRequest()->getQueryParam('Token');
			
			$checkExistingToken = ForgotPassword::find()->where(['Token' => $Token ,'ExpiryStatus' => 0,'UserType' => 1, 'ResetType' => 1])->one();
					
			if(count($checkExistingToken) == 1)
			{
				if ($model->load(Yii::$app->request->post())) 
				{
					if ($model->validate()) 
					{
						if($model->password_hash == $model->confirm_password)
						{
							$newSuperAdminModel = SuperAdminModel::find()->where(['Id' => $checkExistingToken->UserId])->one();
				
							if(count($newSuperAdminModel) == 1)
							{
								$newSuperAdminModel->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
								
								if($newSuperAdminModel->save())
								{
									$checkExistingToken->ExpiryStatus = 1;
									
									if($checkExistingToken->save())
									{
										Yii::$app->session->setFlash('resetsuccess', "Password Changed. Login With Your New Password.");	
										return $this->redirect(['site/login']);
									}
								}
								else 
								{
									Yii::$app->session->setFlash('error', "Something Went Wrong !");
									return $this->render('resetforgotpassword', [
										'model' => $model,
									]);
								}	
							}
							else 
							{
								Yii::$app->session->setFlash('error', "Something Went Wrong !");
								return $this->render('resetforgotpassword', [
									'model' => $model,
								]);
							}
						}
						else
						{
							Yii::$app->session->setFlash('error', "Password does not match the confirm password. !");
							return $this->render('resetforgotpassword', [
									'model' => $model,
								]);
						}
					}
					else
					{
						//Yii::$app->session->setFlash('error', "Something Went Wrong !");
						return $this->render('resetforgotpassword', [
								'model' => $model,
							]);
					}
				}
				else 
				{
					//Yii::$app->session->setFlash('error', "Something Went Wrong !");
					return $this->render('resetforgotpassword', [
						'model' => $model,
					]);
				}
			}
			else 
			{
				Yii::$app->session->setFlash('reseterror', 'Reset Url Expired!.. Try Again!..');	
				return $this->render('resetforgotpassword', [
						'model' => $model,
					]);
			}		
		}
		catch(Exception $e)
		{
			throw new \yii\base\Exception($e->getMessage());	
		}
    }
}
