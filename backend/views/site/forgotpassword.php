<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
	<div class="login-logo">
		<b>Bus Tracking</b>
	</div>
	<!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Forgot Password</p>
		
			<?php $form = ActiveForm::begin(); ?>

               <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
			    <?php $session = Yii::$app->session; ?>
				<?php if(Yii::$app->session->hasFlash('mailsuccess')) : ?>
						<span ><label style="color:#00a65a" ><?= Yii::$app->session->getFlash('mailsuccess') ?></label>				
				<?php endif; ?>
			   
				<?php $session = Yii::$app->session; ?>
				<?php if(Yii::$app->session->hasFlash('mailerror')) : ?>
						<p class="help-block help-block-error" style="color:#ED6663;" ><?= Yii::$app->session->getFlash('mailerror') ?></p>				
				<?php endif; ?>
			   
			   
			   <?= Html::submitButton('Email', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
			   
			    <?= Html::a('Back To Login', Yii::$app->request->baseUrl."/site/login" , ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            
			<?php ActiveForm::end(); ?>
		
		
            <!--<div class="form-group has-feedback">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<!--<? //$form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            </div>-->
          
            
       
    </div>
 </div>