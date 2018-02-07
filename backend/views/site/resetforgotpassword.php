<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forget Password ?';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reset-form">
    <h3 class="form-title font-green"><?= Html::encode($this->title) ?></h3>   
     <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter your e-mail address below to reset your password. </span>
                </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
             <div class="form-group">
                <?= $form->field($model, 'password_hash')->passwordInput(['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'New Password'])->label(false) ?>
            </div>
             <div class="form-group">
                <?= $form->field($model, 'confirm_password')->passwordInput(['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Confirm Password', 'id'=>'confirm'])->label(false) ?>
            </div>
			
			<?php $session = Yii::$app->session; ?>
			<?php if(Yii::$app->session->hasFlash('error')) : ?>
					<p class="help-block help-block-error" style="color:#ED6663;" ><?= Yii::$app->session->getFlash('error') ?></p>				
			<?php endif; ?>
            
			<div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right" id"submit">Submit</button>
            </div>
          
			<div class="create-account">
				<p>
					<a href="http://supremetechnologies.in/" style="color:#fff;font-size:12px;text-align:right!important;">Powered by Supreme Technologies</a>
				</p>
            </div>

            <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<< JS

$(document).ready(function() {
   $('#submit').click(function() {
      alert('fsdf');
   }); 
});
JS;
$this->registerJs($script);

?>
