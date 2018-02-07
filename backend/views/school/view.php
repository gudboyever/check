<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\School */

$this->title = "School View";
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-view">
    <div class="portlet box green">
		<div class="portlet-title">
            <div class="caption">
                <i class="fa fa-institution"></i><?= Html::encode($this->title) ?>
            </div>
    </div>
	    <div class="portlet-body" style="display: block;">
		    <div class="table-scrollable">
			    <table class="table table-striped table-hover">
				   <thead>
					    <tr>
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    //'Id',
                                    'SchoolName',
                                    // 'auth_key',
                                    // 'password_hash',
                                    // 'password_reset_token',
                                    'Email:text',
                                    'Phone',
                                    'Website',
                                    'Address',
                                    'State',
                                    'Country',
                                    'PinCode',
                                    //'Latitude',
                                    //'Longitude',
                                    [
										'attribute' => 'Logo',										
										'value' => $model->LogoImgURL,
                                        'format' => ['image', ['width' => '150', 'height' => '150']]
                                    ],
                                    [
										'attribute' => 'Status',										
										'value' => $model->Status == 1 ? "Active" : "InActive",
                                    ],
                                    // 'CreatedDate',
                                    // 'UpdatedDate',
                                ],
                            ]) ?>
				<div id="map" style="width:100%;height:300px;"></div>	
							<script>
								function myMap() 
								{
									var mapCanvas = document.getElementById("map");
									var myCenter = 	new google.maps.LatLng(<?= $model->Latitude;?>, <?= $model->Longitude;?>);									
									 var mapOptions = {center: myCenter, zoom: 18};
									  var map = new google.maps.Map(mapCanvas, mapOptions);
									var marker = new google.maps.Marker({
										 position: myCenter,
										animation: google.maps.Animation.BOUNCE									
									});
									marker.setMap(map);

								}
							</script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoGQA2fFG2SQPkiBCdDmCYhntTXQl0dEY&callback=myMap"></script>	

                        </tr>
				    </thead>
			    </table>
		    </div>

			<?= Html::a('Cancel', ['/school/cancel'], ['class'=>'btn default']) ?>
            <?= Html::a('Edit', ['update', 'id' => $model->Id], ['class' => 'btn btn-success']) ?>
			<!--<input type="hidden" id="hfbaseURL" name="hfbaseURL" value="<= $baseURL ?>">						 -->
        </div>
                                
    </div>
</div>

<?php

$script = <<< JS
$(function()
{
        $(".page-sidebar-menu").find('li').removeClass('active');
        $('#school').addClass('active'); 
});





JS;
$this->registerJs($script);

?>
