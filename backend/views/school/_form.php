<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\models\School */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-form">
<?php $form = ActiveForm::begin([
			'id' => 'form-signup',
			'fieldConfig' => [
			'enableAjaxValidation' =>true,
			'options' => [
			'tag' => false,
    ],
    ],
    ]); ?>

<div class="row">
	<div class="col-md-12">
	   <!-- BEGIN VALIDATION STATES-->
	    <div class="portlet light bordered">

		    <div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase font-red"></i>
					<span class="caption-subject font-red sbold"><?= Html::encode($this->title) ?></span>
				</div>
		    </div>

			<div class="portlet-title" style="border:none"> 
				<div class="portlet-body">
					<div class="tabbable">
						<div class="tabbable-custom nav-justified">
							<ul class="nav nav-tabs nav-justified" id="navPane">
								<li class="" id="School_Tab">
									<a href="#tab_15_1" data-toggle="tab" aria-expanded="true"> School </a>
								</li>

								<li class="" id="Address_Details">
									<a href="#tab_15_2" data-toggle="tab" aria-expanded="false"> Address </a>
								</li>						 
							</ul>
						<!--<div class="portlet-body">
							<div class="form-body"> -->
							<div class="tab-content">
								<div class="tab-pane active" id="tab_15_1" style="top:20px;position:relative">			
												
									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-schoolname required ">
										<?= $form->field($model, 'SchoolName')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">School Name</label>
									</div>	

									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-description required ">
										<?= $form->field($model, 'Description')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">Description</label>
									</div>	

									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-username required ">
										<?= $form->field($model, 'username',['inputOptions' => ['autocomplete' => 'new-password']])->textInput(['maxlength' => true , 'class'=> 'form-control '])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">User Name</label>
									</div>
									
									 <?php if ($model->password_hash == null): ?>		
										<div id="mydiv" class="form-group form-md-line-input  has-success field-school-password_hash required ">
											<?= $form->field($model, 'password_hash',['inputOptions' => ['autocomplete' => 'new-password']])->passwordInput(['maxlength' => true, 'class'=> 'form-control '])->label(false) ?>
											<p class="help-block help-block-error"></p>
											<label for="form_control_1">Password</label>
										</div>
									<?php endif; ?>		

									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-email required ">
										<?= $form->field($model, 'Email')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">Email</label>
									</div>

									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-phone required ">
										<?= $form->field($model, 'Phone')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">Phone</label>
									</div>

									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-website required ">
										<?= $form->field($model, 'Website')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">Website</label>
									</div>
									
									<?php if ($model->LogoImgURL != null): ?>	
									<?php $i = count($model->LogoImgURL); ?>
										<div id="mydiv" class="form-group form-md-line-input has-success field-school-logoimgurl required ">
											<label for="form_control_1">Logo</label>
											<?= $form->field($model, 'LogoImgURL')->widget(FileInput::classname(), [
												'options' => ['accept' => 'image/*'],
												'pluginOptions' => [
																	'showUpload' => false,
																	'showCancel' => false,
																	'allowedFileExtensions' => ['jpg','png','jpeg'],
																	'initialPreview'=> [
																		'<img src="'.$model->LogoImgURL.'" class="file-preview-image">',
																		],
																	'required' => ($i == 0) ? true : false,
																	]
											])->label(false); ?>	
											<p class="help-block help-block-error" style="opacity:1"></p><br>
											<label class="profile-size">Profile Image Size (500px * 500px)</label>

										</div>
									<?php else : ?>

										<div id="mydiv" class="form-group form-md-line-input  has-success field-school-logoimgurl required ">
											<label for="form_control_1">Logo</label>
											<?= $form->field($model, 'LogoImgURL')->widget(FileInput::classname(), [
														'options' => ['accept' => 'image/*'],
														'pluginOptions' => [
																			'showUpload' => false,
																			'showCancel' => false,
																			'allowedFileExtensions' => ['jpg','png','jpeg'],
																			'required' => true,
																			]
													])->label(false); ?>
											<p class="help-block help-block-error" style="opacity:1"></p><br>
											<label class="profile-size">Profile Image Size (500px * 500px)</label>
										</div>
									<?php endif; ?>	
						
									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-status required ">
										<label for="form_control_1">Status</label>
										<?= $form->field($model, 'Status')->widget(SwitchInput::classname(), [
											'type' => SwitchInput::CHECKBOX,
											'pluginOptions' => [
																	'handleWidth'=>50,
																	'onText' => 'Active',
																	'offText' => 'InActive',
																],
											'labelOptions' => ['style' => 'font-size: 21px'] ])->label(false)?>
										<p class="help-block help-block-error"></p>
									</div>
									
									<div style="width:100%;text-align:right">           
										<div class="btn-group">
											<button class="btn" id="nexttab" type="button">Next</button>
										</div>                                          
									</div>
									</br>
																	
								</div>
								<div class="tab-pane active" id="tab_15_2" style="top:20px;position:relative">		
								
									
									<div id="mydiv" class="form-group form-md-line-input  has-success field-school-address required ">
										<?= $form->field($model, 'Address')->textInput(['maxlength' => true])->label(false) ?>
										<p class="help-block help-block-error"></p>
										<label for="form_control_1">Address</label>
									</div>
									
									
									<div class="row">
									
										<div class="col-md-6">
											<div id="mydiv" class="form-group form-md-line-input  has-success field-school-location required ">
												<?= $form->field($model, 'Location')->textInput(['maxlength' => true])->label(false) ?>
												 <p class="help-block help-block-error"></p>
												<label for="form_control_1">Location</label>
											</div>
										</div>
									
										<div class="col-md-6">
											<div id="mydiv" class="form-group form-md-line-input  has-success field-school-state required ">
												<?= $form->field($model, 'State')->textInput(['maxlength' => true])->label(false) ?>
												<p class="help-block help-block-error"></p>
												<label for="form_control_1">State</label>
											</div>
										</div>
										
										<div class="col-md-6">
											<div id="mydiv" class="form-group form-md-line-input  has-success field-school-country required ">
												<?= $form->field($model, 'Country')->textInput(['maxlength' => true])->label(false) ?>
												 <p class="help-block help-block-error"></p>
												<label for="form_control_1">Country</label>
											</div>
										</div>
										
										<div class="col-md-6">
											<div id="mydiv" class="form-group form-md-line-input  has-success field-school-pincode required ">
												<?= $form->field($model, 'PinCode')->textInput(['maxlength' => true])->label(false) ?>
												<p class="help-block help-block-error"></p>
												<label for="form_control_1">Pin Code</label>
											</div>
										</div>
										<div id="latlog">	
											<div class="col-md-6">
												<div id="mydiv" class="form-group form-md-line-input  has-success field-school-latitude required ">
													<?= $form->field($model, 'Latitude')->textInput(['maxlength' => true])->label(false) ?>
													<p class="help-block help-block-error"></p>
													<label for="form_control_1">Latitude</label>
												</div>
											</div>
											
											<div class="col-md-6">
												<div id="mydiv" class="form-group form-md-line-input  has-success field-school-longitude required ">
													<?= $form->field($model, 'Longitude')->textInput(['maxlength' => true])->label(false) ?>
													<p class="help-block help-block-error"></p>
													<label for="form_control_1">Longitude</label>
												</div>
											</div> 
										</div>	
									</div>
									
									<div class="map height-300 box"  style="width: 100%; height: 400px; position: relative; overflow: hidden;" id="map"></div>

									<div style="width:100%;text-align:right">           
										<div class="btn-group">
											<button class="btn" id="prevtab" type="button">Prev</button>
										</div>                                          
									</div>
									<div class="form-group">
										<?= Html::a('Cancel', ['/school/cancel'], ['class'=>'btn default']) ?>
										<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
									</div>

								</div>
							</div>							
						</div>
					</div>						
				</div>
			</div>
		</div>

    <?php ActiveForm::end(); ?>
	</div>
</div>

<?php 

$script = <<< JS


$(document).ready(function() {
   	$('#school-phone').attr({ maxLength : 15 });
   	$('#school-schoolname').attr({ maxLength : 100 });
   	$('#school-description').attr({ maxLength : 255 });
   	$('#sschool-email').attr({ maxLength : 50 });
   	$('#school-website').attr({ maxLength : 100 });
   	$('#school-username').attr({ maxLength : 100 });
    $('#school-pincode').attr({ maxLength : 6 });
	$(".page-sidebar-menu").find('li').removeClass('active');
	$('#school').addClass('active');  

	//$('#latlog').hide();


	setTimeout(function(){ 
			tabs.filter('#School_Tab').find('a[data-toggle="tab"]').tab('show');
	  }, 200);  	
});


$("input#school-email").keyup(function() {
    $(this).val($(this).val().toLowerCase());
}); 

$("input#school-phone").keypress(function(event) {

  return /\d/.test(String.fromCharCode(event.keyCode));
});

$("input#school-email").keyup(function() {
    $(this).val($(this).val().toLowerCase());
});


var tabs = $('.tabbable li');

$('#prevtab').on('click', function() {
    tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');		
	
});

$('#nexttab').on('click', function() {
	
    tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
	var string_ele= $('#navPane li').filter('.active').attr("id");
});

JS;
$this->registerJs($script);

?>


	
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoGQA2fFG2SQPkiBCdDmCYhntTXQl0dEY&libraries=places&region=in"></script>

        <script type = "text/javascript">

            //var editAddLat = 12.929499556010754;
            //var editAddLong = 80.1151692867279;
            
			//var editAddLat = 39.9826141;
			//var editAddLong = -83.2710229;
				
			var schoollattitude = document.getElementById('school-latitude').value;
			var schoollongitude = document.getElementById('school-longitude').value;
			
			if(schoollattitude != "" && schoollongitude != "")
			{
				var editAddLat = schoollattitude;
                var editAddLong = schoollongitude;
			}
			else
			{
				var editAddLat = 13.0827;
                var editAddLong = 80.2707;
			}

                initializes(editAddLat,editAddLong);
                
                var map;
                var geocoder;
                var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 50,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP };

                function initializes(editAddLat,editAddLong) 
                {	
                    
                    var myOptions = {
                            center: new google.maps.LatLng(editAddLat, editAddLong),
                            zoom: 20,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                                    

                    geocoder = new google.maps.Geocoder();
                    var map = new google.maps.Map(document.getElementById("map"),
                    myOptions);
                    
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng( editAddLat,editAddLong),
                        map: map,
                        animation: google.maps.Animation.BOUNCE,
                    });
                    
                    /* var loadltln = '('+editAddLat+ ', ' +editAddLong+')';
                    alert(loadltln);
                    */
                                        
                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng);
                    });
                    
                    var marker;					
                    function placeMarker(location) {	
                        if(marker){ //on vérifie si le marqueur existe
                            marker.setPosition(location); //on change sa position
                        }else{
                            marker = new google.maps.Marker({ //on créé le marqueur
                                position: location, 
                                map: map
                            });
                        }
                        document.getElementById('school-latitude').value=location.lat();
                        document.getElementById('school-longitude').value=location.lng();
                        getAddress(location);
                    }

                        function getAddress(latLng) {
                        geocoder.geocode( {'latLng': latLng},
                            function(results, status) {
                            if(status == google.maps.GeocoderStatus.OK) {
                                if(results[0]) {
                               document.getElementById("school-address").value = results[0].formatted_address;		
                                //document.getElementById("school-user").value = results[0].formatted_address;	                                
                                
                                $('#school-state').val('');
                                $('#school-country').val('');
                                $('#school-postalcode').val('');
                                //$('#school-street').val('');
                                //$('#addressStreetAddress').val('');
                                
                                for (var i=0; i<results[0].address_components.length; i++) {
                                    for (var b=0;b<results[0].address_components[i].types.length;b++) {
                                                                                                                    
                                        if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                            $('#school-state').val(results[0].address_components[i].long_name);
                                        }									
                                        
                                        if (results[0].address_components[i].types[b] == "country") {
                                            $('#school-country').val(results[0].address_components[i].long_name);
                                        }
                                        
                                        if (results[0].address_components[i].types[b] == "postal_code") {
                                            $('#school-postalcode').val(results[0].address_components[i].long_name);
                                        }                                                                           
                                    }
                                }
                                }
                                else {
                                document.getElementById("school-location").value = "No results";
                                }
                            }
                            else {
                                document.getElementById("school-location").value = status;
                            }
                            });
                        }	
                    
                }         

        </script>


<script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('school-address'));
        
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var mesg = "Address: " + address;
            mesg += "\nLatitude: " + latitude;
            mesg += "\nLongitude: " + longitude;
            initialize(latitude,longitude);
            //placeMarker('('+latitude+','+longitude+')');
            //alert('('+latitude+','+longitude+')');
            
        var map;
        var geocoder;
        var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 50,
                            mapTypeId: google.maps.MapTypeId.ROADMAP };

        function initialize(latitude,longitude) 
        {	
            var myOptions = {
                    center: new google.maps.LatLng(latitude, longitude),
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };		
                
            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map"),
            myOptions);
                                
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude,longitude),
                map: map,
                animation: google.maps.Animation.BOUNCE,
            });


            //place change function with auto filled datas
            //start
           
                var latlng = { lat: latitude, lng: longitude };       
				
                changePlaceMarker(latlng);				

            //end

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

           

            var marker;
            function placeMarker(location) {			
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('school-latitude').value=location.lat();
                document.getElementById('school-longitude').value=location.lng();
                getAddress(location);
            }

            function changePlaceMarker(location) {	
			
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
								
                document.getElementById('school-latitude').value=location.lat;
                document.getElementById('school-longitude').value=location.lng;
                getAddress(location);
            }

                function getAddress(latLng) {
                geocoder.geocode( {'latLng': latLng},
                    function(results, status) {
                    if(status == google.maps.GeocoderStatus.OK) {
                        if(results[0]) {                          
                        //document.getElementById("school-location").value = results[0].formatted_address;	
                        document.getElementById("school-address").value = results[0].formatted_address;	        

                        $('#school-state').val('');
                        $('#school-country').val('');
                        $('#school-pincode').val('');
                        //$('#user-street').val('');
                        //$('#addressStreetAddress').val('');
                        
                        for (var i=0; i<results[0].address_components.length; i++) {
                            for (var b=0;b<results[0].address_components[i].types.length;b++) {
								
								//alert(results[0].address_components[i].long_name);
                                                                                                            
                                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                    $('#school-state').val(results[0].address_components[i].long_name);
                                }									
                                
                                if (results[0].address_components[i].types[b] == "country") {
                                    $('#school-country').val(results[0].address_components[i].long_name);
                                }
                                
                                if (results[0].address_components[i].types[b] == "postal_code") {
                                    $('#school-pincode').val(results[0].address_components[i].long_name);
                                }							
								
								if (results[0].address_components[i].types[b] == "sublocality") {
                                    $('#school-location').val(results[0].address_components[i].long_name);
                                }
                               
                            }
                        }
                        }
                        else {
                            //document.getElementById("accomodation-location").value = "No results";
                        }
                    }
                    else {
                        //document.getElementById("accomodation-location").value = status;
                    }
                    });
                }	
            
        }
        
        });
        });
</script>
