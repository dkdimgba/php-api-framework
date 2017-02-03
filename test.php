<?php

$AUTH_TOKEN = "";

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