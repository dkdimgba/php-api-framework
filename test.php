<?php


$data = 
	'{
		"value": "2348060923423",
		"object": "phone"
	}'; 



$AUTH_TOKEN = "PJRcbDxdfBo49AwFvJDY-qZQmFQXL4MplqqfonfzV0Ag9SUtMoBIu096W8zdrI1kH9UJwVN-sw4S-q68ElP5yBYSFv_QO0O7_LStvqS-EjY6kBSTvRenRSViPqip-bf5dr2Gy2nx4ZqtC_a7GM4ekLjvB1vP0Pp_dXOKA8UIu3DkcTit6KNblM8JfSgZprs9ZK_mAM4LywJgW1f9L1CJ7HfbPLPXB0k21d39FVcs6ZBqhUX3Qvi3EgHN-1eKX6b8KvKYed3Kpw8wxJfPYqctGvdUWnGlIkq4yy6dkM3WNSeeLN3s0BSYx4pmPjDLYju8nIQSMsImetpCiTJOe3WpFQk1Vy4wk5ocPhrE4eBBNCutBpssdOa7DANRKNybvxz2Qg38aHlmGk0OR0qyUDVu8zEreRzGyCR7l0APhNbFBQ3WOCkX4QjfVJ-7alz25vSm6anYXk1vQVbJlnCaFBAt0mPl2S0aw9cu0NWY8eth2Z72hk1_DB8iFBb_YYyBAt8A4XSle9QBKlUC-YH27zXi3Q";

// initialie the curl function
$ch = curl_init();
// set curl url
// curl_setopt($ch, CURLOPT_URL, "http://localhost/ed/projaro/yellownest/api/v1/getusercategories/4");
curl_setopt($ch, CURLOPT_URL, "url/api/v1/example");
// return the response instead of printing
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// curl_setopt($ch, CURLOPT_POST, true);// set the post method to true
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SET THE DATA TO SEND
// pass the headers 
// echo AUTH_TOKEN;
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$authcode));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$AUTH_TOKEN));
// send the request and store the response in $response
$response = curl_exec($ch);
// header("Access-Control-Allow-Origin: *");
curl_close($ch);

// returns the response in json format
echo '<pre>';
echo $response;
echo '</pre>';