<?php

$url = 'https://www.viralget.com.ng/api/cleandb';

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, $url);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$message = curl_exec($cURLConnection);
// curl_close($cURLConnection);

// $jsonArrayResponse = json_decode($message);
// return $jsonArrayResponse;