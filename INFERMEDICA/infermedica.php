<?php
function getJSON($loc){
   
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.infermedica.com/v2/".$loc,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "app_id: 16d28cf7",
	    "app_key: c5fe62dc174660c87254f1632c37d261",
	    "cache-control: no-cache",
	    "postman-token: 4fc33eed-4dc7-8a08-c0da-314161c5d16a"
	  ),
	));
	//curl_easy_setopt(curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return $response;
	}

}

function postJSON($loc,$data_var){
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.infermedica.com/".$loc,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $data_var,
	  CURLOPT_HTTPHEADER => array(
	    "app_id: 16d28cf7",
	    "app_key: c5fe62dc174660c87254f1632c37d261",
	    "cache-control: no-cache",
	    "postman-token: 559a8e01-505f-4115-5cbe-76bee18c0a05",
	    'Content-Type: application/json',                                                                                
    	'Content-Length: ' . strlen($data_var)
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return $response;
	}

}


?>

