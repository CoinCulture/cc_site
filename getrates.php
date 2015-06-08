<?php

function get_rate() {
	$ch = curl_init();
	$url = "https://bitpay.com/rates/cad";
	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    	curl_setopt($ch, CURLOPT_HEADER, FALSE);
   	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset=utf-8"));
    	curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    	//curl_setopt($ch, CURLOPT_POSTFIELDS, FALSE);
    	$response = curl_exec($ch);
//	error_log($response);
	curl_close($ch);
	$obj = json_decode($response, TRUE);
    	return $obj;
}

//$var = get_rate();
//error_log("var ".var_export($var, true));

function get_price($p) {
	$var = get_rate();
	$var = $var['data']['rate'];
//	error_log("wtf ".var_export($var, true));
	$var = round($var, 2);
	$buy = $var * 1.06;
	$sell = $var * 0.97;
	$buy = round($buy, 2);
	$sell = round($sell, 2);
	if($p === 'B') {return $buy;}
	if($p === 'S') {return $sell;}
}

//$var1 = get_price();
//error_log("buy ".var_export($var1, true));

?>
