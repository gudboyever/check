<?php

	
if (isset($_POST['fileName']) && $_POST['fileData'])
{
	$uploadDir = "img/";

	if(file_put_contents($uploadDir. $_POST['fileName'],base64_decode($_POST['fileData'])))
	{
		echo "Success";
	}
}


 
?>