<?php
include 'createConnection.php'; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');

    $json = file_get_contents('php://input');
    $json  = json_decode($json ,true);
    $postData = array('script' => $json['source'],
                     'language' => $json['lang'], 
                     'versionIndex' => "0", 
                     'clientId' => "507d9368ee9ef31e58291ed8703f11c5", 
                     'clientSecret' =>  "6bac0f8c861d165d2f9784979f1c3cead88e19d95dc564feb6fb2f67924017ad");

    $get_data = callAPI('POST', 'https://api.jdoodle.com/v1/execute', json_encode($postData));
    $response = json_decode($get_data, true);
    $data = $response['output'];
    

    echo $data;
?>