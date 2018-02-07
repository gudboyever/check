<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-form">
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Change Password</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane active" id="tab_1_3">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" id ="oldpswd" class="form-control">
                                                                <p class="help-block help-block-error" id="oldpasword_error"></p> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" id ="newpswd" class="form-control">
                                                                <p class="help-block help-block-error" id="newpassword_error"></p> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" id ="confirmpswd" class="form-control">
                                                                <input type="hidden" class="form-control" id="baseURL" name="baseURL" value="<?= Url::home(true) ?>" /> 
                                                                <p class="help-block help-block-error" id="confirmpassword_error"></p></div>

                                                            <div><p class="help-block help-block-error" id="changepassword_success"></p>
                                                                 <p class="help-block help-block-error" id="changepassword_failure"></p>
                                                            </div>    
                                                            <div class="margin-top-10">
                                                                <!-- <a href="" class="btn green"> Change Password </a> -->
                                                                <?= Html::submitButton('Change Password', ['class' => 'btn green', 'id' => 'changepswd', 'name' => 'change-password']) ?>
                                                                <a href="index" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <php ActiveForm::end(); ?>
</div>


<?php 

$script = <<< JS

var baseurl = $('#baseURL').val();

$('#changepswd').click(function()
{
    var oldPassword = $('#oldpswd').val();
    var newPassword = $('#newpswd').val();
    var confirmPassword = $('#confirmpswd').val();
    
    if(oldPassword == "" || newPassword == "" || confirmPassword == "")
    {
        if(oldPassword != "" && newPassword == "" && confirmPassword == "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('');
            $('#newpassword_error').html('<b> New Password </b> cannot be blank'); 
            $('#confirmpassword_error').html('<b> Confirm Password </b> cannot be blank');     
        }
        else if(oldPassword == "" && newPassword != "" && confirmPassword == "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('<b> Old Password </b> cannot be blank');
            $('#newpassword_error').html(''); 
            $('#confirmpassword_error').html('<b> Confirm Password </b> cannot be blank');     
        }
        else if(oldPassword == "" && newPassword == "" && confirmPassword != "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('<b> Old Password </b> cannot be blank');
            $('#newpassword_error').html('<b> New Password </b> cannot be blank'); 
            $('#confirmpassword_error').html('');      
        }
        else if(oldPassword != "" && newPassword != "" && confirmPassword == "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('');
            $('#newpassword_error').html(''); 
            $('#confirmpassword_error').html('<b> Confirm Password </b> cannot be blank');     
        }
        else if(oldPassword != "" && newPassword == "" && confirmPassword != "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('');
            $('#newpassword_error').html('<b> New Password </b> cannot be blank'); 
            $('#confirmpassword_error').html('');      
        }
        else if(oldPassword == "" && newPassword != "" && confirmPassword != "")
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('<b> Old Password </b> cannot be blank');
            $('#newpassword_error').html(''); 
            $('#confirmpassword_error').html('');      
        }
        else
        {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('<b> Old Password </b> cannot be blank');
            $('#newpassword_error').html('<b> New Password </b> cannot be blank');
            $('#confirmpassword_error').html('<b> Confirm Password </b> cannot be blank');
        }
        return false;
    }
    else if(newPassword !== confirmPassword)
    {
            $('#changepassword_success').html('');
            $('#changepassword_failure').html('');
            $('#oldpasword_error').html('');
            $('#newpassword_error').html(''); 
            $('#confirmpassword_error').html('<b> Password </b> does not match the Confirm Password </b>'); 
            return false;
    }
    else if(oldPassword === newPassword)
    {
            $('#oldpasword_error').html('');
            $('#newpassword_error').html(''); 
            $('#confirmpassword_error').html('<b> Old Password </b> and <b> New Password </b> cannot be same'); 
            return false;
    }
    else
    { 
   
        $.ajax({
        type: "POST",
        contentType: "application/json; charset=utf-8",
        url: baseurl+"site/resetpassword?newPassword="+newPassword+"&oldPassword="+oldPassword,  
        dataType: "json",
       
            success: function(data)
            { //alert(data);
                if(data == 1)
                {
                    $('#oldpasword_error').html('');
                    $('#newpassword_error').html(''); 
                    $('#confirmpassword_error').html('');
                    $('#changepassword_failure').html(''); 
                    
                    $('#oldpswd').val('');
                    $('#newpswd').val('');
                    $('#confirmpswd').val('');
                    
                    $('#changepassword_success').html('Password Changed Successfully');                          
                            
                }
                else if(data == 2)
                {
                    $('#oldpasword_error').html('');
                    $('#newpassword_error').html(''); 
                    $('#confirmpassword_error').html('');
                    $('#changepassword_failure').html(''); 
                    
                    $('#oldpswd').val('');
                    $('#newpswd').val('');
                    $('#confirmpswd').val('');
                    
                    $('#changepassword_failure').html('Incorrect Old Password');                          
                        
                }
                else
                {
                    $('#changepassword_failure').html('Something Went Wrong');  
                }
            },
            error: function (Result) 
            {
                alert("failed to interact with url");
                /* $('#oldpasword_error').html('');
                $('#newpassword_error').html(''); 
                $('#confirmpassword_error').html('');
                $('#changepassword_success').html('');
                $('#changepassword_failure').html('Something Went Wrong'); */
            }  
        });
        //window.location.href = baseurl+"merchant/changepassword?oldpassword="+oldPassword+"&newpassword="+newPassword;  
    }

   
   return false;
 });

JS;
$this->registerJs($script);

?>