<?php

$curl = curl_init();

$fields = array(
  'filterKey' => urlencode($_REQUEST['filterKey']),
  'name' => urlencode($_REQUEST['name']),
  'pageNumber' => 1,
  'pageSize' => 25
);

$fields_string = "";

foreach($fields as $key=>$value) {
  $fields_string .= $key.'='.$value.'&';
}
rtrim($fields_string, '&');

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://census.daybreakgames.com/rest/leaderboard/kotk/name-search-get-page",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $fields_string,
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/javascript, */*; q=0.01",
    "accept-encoding: gzip, deflate, br",
    "accept-language: en-US,en;q=0.8,es;q=0.6,pt;q=0.4,gl;q=0.2",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "origin: https://www.h1z1.com",
    "postman-token: ab350eee-35c5-e8ac-b5bd-986f1b56f5cb",
    "referer: https://www.h1z1.com/king-of-the-kill/leaderboards/pre-season-2",
    "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);
  header('Content-Type: application/json');
  echo json_encode($data);
}