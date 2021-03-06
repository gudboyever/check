<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<link href="/YOUR_PATH/favicon.ico" rel="icon" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body class="page-container-bg-solid page-header-fixed page-md">
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="page-header navbar navbar-fixed-top">
               <!-- BEGIN HEADER INNER -->
               <div class="page-header-inner ">
                  <!-- BEGIN LOGO -->
                  <div class="page-logo">
                     <a href='index'>
                     <img src="<?= Yii::$app->request->baseUrl ?>/img/BUSTRACKING.png" alt="logo" class="logo-default" style="width: 170px;bottom: 40px;position: relative;" />
                     <img src="<?= Yii::$app->request->baseUrl ?>" alt="logo" class="logo-default" style="width: 170px;bottom: 7px;position: relative;display:none" />
                      </a>
                     <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                     </div>
                  </div>
                  <!-- END LOGO -->
                  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                  <!-- END RESPONSIVE MENU TOGGLER -->
                  <!-- BEGIN PAGE ACTIONS -->
                  <!-- DOC: Remove "hide" class to enable the page header actions -->
                  <div class="page-actions">
                     <div class="btn-group">
                        <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="hidden-sm hidden-xs">Actions&nbsp;</span>
                        <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                           <li>
                              <a href="javascript:;">
                              <i class="icon-docs"></i> New Post </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <i class="icon-tag"></i> New Comment </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <i class="icon-share"></i> Share </a>
                           </li>
                           <li class="divider"> </li>
                           <li>
                              <a href="javascript:;">
                              <i class="icon-flag"></i> Comments
                              <span class="badge badge-success">4</span>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <i class="icon-users"></i> Feedbacks
                              <span class="badge badge-danger">2</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END PAGE ACTIONS -->
                  <!-- BEGIN PAGE TOP -->
                  <div class="page-top">
                     <!-- BEGIN HEADER SEARCH BOX -->
                     <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                     <form class="search-form" action="page_general_search_2.html" method="GET">
                        <!--<div class="input-group">
                           <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                           <span class="input-group-btn">
                           <a href="javascript:;" class="btn submit">
                           <i class="icon-magnifier"></i>
                           </a>
                           </span>
                        </div>-->
                     </form>
                     <!-- END HEADER SEARCH BOX -->
                     <!-- BEGIN TOP NAVIGATION MENU -->
                     <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                           <li class="separator hide"> </li>
                           <!-- BEGIN NOTIFICATION DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                           <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                           <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-bell"></i>
                              <span class="badge badge-success"> 7 </span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li class="external">
                                    <h3>
                                       <span class="bold">12 pending</span> notifications
                                    </h3>
                                    <a href="page_user_profile_1.html">view all</a>
                                 </li>
                                 <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">just now</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-success">
                                          <i class="fa fa-plus"></i>
                                          </span> New user registered. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">3 mins</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-danger">
                                          <i class="fa fa-bolt"></i>
                                          </span> Server #12 overloaded. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">10 mins</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-warning">
                                          <i class="fa fa-bell-o"></i>
                                          </span> Server #2 not responding. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">14 hrs</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-info">
                                          <i class="fa fa-bullhorn"></i>
                                          </span> Application error. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">2 days</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-danger">
                                          <i class="fa fa-bolt"></i>
                                          </span> Database overloaded 68%. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">3 days</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-danger">
                                          <i class="fa fa-bolt"></i>
                                          </span> A user IP blocked. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">4 days</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-warning">
                                          <i class="fa fa-bell-o"></i>
                                          </span> Storage Server #4 not responding dfdfdfd. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">5 days</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-info">
                                          <i class="fa fa-bullhorn"></i>
                                          </span> System Error. </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="time">9 days</span>
                                          <span class="details">
                                          <span class="label label-sm label-icon label-danger">
                                          <i class="fa fa-bolt"></i>
                                          </span> Storage server failed. </span>
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <!-- END NOTIFICATION DROPDOWN -->
                           <li class="separator hide"> </li>
                           <!-- BEGIN INBOX DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-envelope-open"></i>
                              <span class="badge badge-danger"> 4 </span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li class="external">
                                    <h3>You have
                                       <span class="bold">7 New</span> Messages
                                    </h3>
                                    <a href="app_inbox.html">view all</a>
                                 </li>
                                 <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                       <li>
                                          <a href="#">
                                          <span class="photo">
                                          <img src="<?= Yii::$app->request->baseUrl ?>/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                          <span class="subject">
                                          <span class="from"> Lisa Wong </span>
                                          <span class="time">Just Now </span>
                                          </span>
                                          <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <span class="photo">
                                          <img src="img/avatar3.jpg" class="img-circle" alt=""> </span>
                                          <span class="subject">
                                          <span class="from"> Richard Doe </span>
                                          <span class="time">16 mins </span>
                                          </span>
                                          <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <span class="photo">
                                          <img src="img/avatar1.jpg" class="img-circle" alt=""> </span>
                                          <span class="subject">
                                          <span class="from"> Bob Nilson </span>
                                          <span class="time">2 hrs </span>
                                          </span>
                                          <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <span class="photo">
                                          <img src="img/avatar2.jpg" class="img-circle" alt=""> </span>
                                          <span class="subject">
                                          <span class="from"> Lisa Wong </span>
                                          <span class="time">40 mins </span>
                                          </span>
                                          <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <span class="photo">
                                          <img src="img/avatar3.jpg" class="img-circle" alt=""> </span>
                                          <span class="subject">
                                          <span class="from"> Richard Doe </span>
                                          <span class="time">46 mins </span>
                                          </span>
                                          <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <!-- END INBOX DROPDOWN -->
                           <li class="separator hide"> </li>
                           <!-- BEGIN TODO DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-calendar"></i>
                              <span class="badge badge-primary"> 3 </span>
                              </a>
                              <ul class="dropdown-menu extended tasks">
                                 <li class="external">
                                    <h3>You have
                                       <span class="bold">12 pending</span> tasks
                                    </h3>
                                    <a href="?p=page_todo_2">view all</a>
                                 </li>
                                 <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">New release v1.2 </span>
                                          <span class="percent">30%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">40% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">Application deployment</span>
                                          <span class="percent">65%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">65% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">Mobile app release</span>
                                          <span class="percent">98%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">98% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">Database migration</span>
                                          <span class="percent">10%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">10% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">Web server upgrade</span>
                                          <span class="percent">58%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">58% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">Mobile development</span>
                                          <span class="percent">85%</span>
                                          </span>
                                          <span class="progress">
                                          <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">85% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:;">
                                          <span class="task">
                                          <span class="desc">New UI release</span>
                                          <span class="percent">38%</span>
                                          </span>
                                          <span class="progress progress-striped">
                                          <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">38% Complete</span>
                                          </span>
                                          </span>
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <!-- END TODO DROPDOWN -->
                           <!-- BEGIN USER LOGIN DROPDOWN -->
                           <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                           <li class="dropdown dropdown-user dropdown-dark">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                 <span class="username username-hide-on-mobile"> Nick </span>
                                 <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                 <img alt="" class="img-circle" src="<?= Yii::$app->request->baseUrl ?>/img/avatar9.jpg" /> 
                              </a>
                              <ul class="dropdown-menu dropdown-menu-default">
                                 <li>
                                    <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                                 </li>
                                 <li>
                                    <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                                 </li>
                                 <li>
                                    <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 3 </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="app_todo_2.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 7 </span>
                                    </a>
                                 </li>
                                 <li class="divider"> </li>
                                 <li>
                                    <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                                 </li>
                                 <li>
                                    <a href="<?= Yii::$app->request->baseUrl ?>/site/changepassword">
                                    <i class="icon-key"></i> Change Password </a>
                                 </li>
                                  <li>
                                    <!--<a href="page_user_login_1.html">-->
                                    <!--<i class="icon-rocket"></i>-->
                                    <?= Html::a('<i class="md md-history"></i> <i class="icon-key" style="left: 16px;position: absolute;top: 90%;"></i>  Logout', ['site/logout'], ['data-method' => 'post']) ?>
                                    <!--</a>-->
                                 </li>
                                
                              </ul>
                           </li>
                           <!-- END USER LOGIN DROPDOWN -->
                           <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                           <li class="dropdown dropdown-extended quick-sidebar-toggler">
                              <span class="sr-only">Toggle Quick Sidebar</span>
                              <i class="icon-logout"></i>
                           </li> 
                           <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                     </div>
                     <!-- END TOP NAVIGATION MENU -->
                  </div>
                  <!-- END PAGE TOP -->
               </div>
               <!-- END HEADER INNER -->
            </div>

      <div class="page-container">
               <!-- BEGIN SIDEBAR -->
               <div class="page-sidebar-wrapper">
                  <!-- BEGIN SIDEBAR -->
                  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                  <div class="page-sidebar navbar-collapse collapse">
                     <!-- BEGIN SIDEBAR MENU -->
                     <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                     <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                     <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                     <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                     <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                     <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                     <ul class="page-sidebar-menu   "  data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active" id="dashboard">                         
						   <?= Html::a('<i class="icon-screen-desktop"></i> <span class="title">Dashboard</span>', ['/site/index'], ['class'=>'nav-link']) ?>
                        </li>
                        <li class="nav-item start" id="school">
							<?= Html::a('<i class="icon-briefcase"></i><span class="title">Schools</span>', ['/school/index'], ['class'=>'nav-link']) ?>
                        </li>
                        
                     </ul>
                     <!-- END SIDEBAR MENU -->
                  </div>
                  <!-- END SIDEBAR -->
               </div>
               <!-- END SIDEBAR -->
               <div class="page-content-wrapper">
                  <!-- BEGIN CONTENT BODY -->
                  <div class="page-content">

 <?= $content ?>



    </div>
</div>
</div>
</div>
<?php 

$script = <<< JS
$('#btn').css({'display':'block'})
$('#btn').css({'display':'none'})
JS;
$this->registerJs($script);

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>