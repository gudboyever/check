<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-form">
    <h3 class="form-title font-green"><?= Html::encode($this->title) ?></h3>   
     <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter your email and password. </span>
                </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
             <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'form-control form-control-solid placeholder-no-fix','placeholder'=>'User Name'])->label(false) ?>
            </div>
             <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Password'])->label(false) ?>
            </div>
		
		<?php if(Yii::$app->session->hasFlash('resetsuccess')) : ?>
			<span ><label style="color:#00a65a" ><?= Yii::$app->session->getFlash('resetsuccess') ?></label>				
		<?php endif; ?>

            <div class="form-actions">
                <?= Html::submitButton('Login', ['class' => 'btn green uppercase', 'name' => 'login-button']) ?>
                <a href="<?= Yii::$app->request->baseUrl ?>/site/forgotpassword" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
			    <label class="rememberme check mt-checkbox mt-checkbox-outline">                    
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </label>
                
                <div class="create-account">
                <p>
                    <a href="http://supremetechnologies.in/" style="color:#fff;font-size:12px;text-align:right!important;">Powered by Supreme Technologies</a>
                </p>
            </div>

            <?php ActiveForm::end(); ?>

</div>
