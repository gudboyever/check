<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

     <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable" >
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button" >X</button>
                <h4><i class="icon fa fa-check"></i></h4>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

<div class="row">

    <div class="col-md-12">

        <div class="portlet light bordered">

            <div class="portlet-title">

                <div class="caption font-dark">

                    <i class="icon-briefcase" ></i>
                    <span class="caption-subject bold"> <?= Html::encode($this->title) ?></span>

                </div>
            </div>

            <div class="portlet-title">

                <div class="caption font-dark">

                    <div class="dataTables_length" id="sample_1_length">

                        <label>Show <select id="drop_page" name="sample_1_length" aria-controls="sample_1" class="form-control input-sm input-xsmall input-inline">
                        <option value="5">5</option>
                        <option value="10" <?php $session = Yii::$app->session; $drop_page_id = $session->get('drop_page_id'); if(isset($drop_page_id)) { echo $drop_page_id == 10 ? "selected=\"selected\" " : "" ; }  ?> > 10 </option>
                        <option value="20" <?php $session = Yii::$app->session; $drop_page_id = $session->get('drop_page_id'); if(isset($drop_page_id)) { echo $drop_page_id == 20 ? "selected=\"selected\" " : "" ; }  ?> > 20 </option>
                        <option value="50" <?php $session = Yii::$app->session; $drop_page_id = $session->get('drop_page_id'); if(isset($drop_page_id)) { echo $drop_page_id == 50 ? "selected=\"selected\" " : "" ; }  ?> > 50 </option>                                                
                        </select>
                        </label>

                    </div>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided">
                         <?= Html::a('Add New <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn sbold green']) ?>
                            <button class="btn btn-transparent dark btn-outline dropdown-toggle btn-sm btn sbold green " data-toggle="dropdown">Tools
                                 <i class="fa fa-angle-down"></i>
                            </button>
                        <ul class="dropdown-menu pull-right">

                            <li>
                                <a href="javascript:;">
                                <i class="fa fa-print"></i> Print </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                            </li>

                        </ul>
                                            
                    </div>
                </div>
                <input type="hidden" id="hfbaseURL" name="hfbaseURL" value="<?= $baseURL ?>">
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'style'=>'overflow: auto; word-wrap: break-word;'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            //'Id',
            //'SchoolName',
            [					
                'attribute' => 'SchoolName',
                'enableSorting' => false,
                'contentOptions' => [
                 'style'=>'max-width: 20px;'
                 
             ]
             ],
            
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             [					
                'attribute' => 'Email',
                'enableSorting' => false,
                'contentOptions' => [
                 'style'=>'width: 20px;'
                 
             ]
             ],

             //'Phone',
             [					
                'attribute' => 'Phone',
                'enableSorting' => false,
                'contentOptions' => [
                 'style'=>'width: 20px;'
                 
             ]
             ],
            // 'Website',
            [					
                'attribute' => 'Website',
                'enableSorting' => false,
                'contentOptions' => [
                 'style'=>'max-width: 30px;'
                 
             ]
             ],
            // 'Address',
            // 'State',
            // 'Country',
            // 'PinCode',
            // 'LogoImgURL:url',
            // 'Status',
            // 'CreatedDate',
            // 'UpdatedDate',

            ['header' => Html::a('<i class="fa fa-refresh"></i>&nbsp;Reset', ['index'], ['class' => 'btn btn-primary btn-xs', 'style' => 'margin: 2px;']),
            'class' => 'yii\grid\ActionColumn',
			 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>

<?php

$script = <<< JS
$(function(){
    $(".page-sidebar-menu").find('li').removeClass('active');
    $('#school').addClass('active'); 
    $('#w0-filters').td(null);
    });
	
var baseurl = $('#hfbaseURL').val();

$('#drop_page').change(function() {
	
	var id = $('#drop_page').val();

	$.ajax({
		type: "POST",
		contentType: "application/json; charset=utf-8",
		url: baseurl + "school/index?id="+id,
		dataType: "html",
		success: function(data){	
				window.location.href = baseurl+"school/index?id="+id;	
		},
		error: function (Result) {
			//alert('failure');
		}		
		});	
});
JS;
$this->registerJs($script);

?>