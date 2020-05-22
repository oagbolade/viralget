<?php
//--------------------------------Send Mail--------------------------------------------
// $to = "oladayo.agbolade@viralget.com.ng";
// $subject = "CRON Started";
// $txt = "Cron job just ran";
// $headers = "From: viralget" . "\r\n";
// mail($to, $subject, $txt, $headers);
//----------------------------------------------------------------------------

//-----------------------------Future Refactoring-----------------------------------------------
// $categories = ["technology", "movies"];

// foreach($categories as $category){
//     $url = 'https://www.viralget.com.ng/api/cronjob/twitter/' . $category;
//     $cURLConnection = curl_init();
//     curl_setopt($cURLConnection, CURLOPT_URL, $url);
//     curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
//     $message = curl_exec($cURLConnection);
// }
//----------------------------------------------------------------------------

$url = 'https://www.viralget.com.ng/api/cronjob/twitter/technology';

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, $url);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$message = curl_exec($cURLConnection);
// curl_close($cURLConnection);

// $jsonArrayResponse = json_decode($message);
// return $jsonArrayResponse;