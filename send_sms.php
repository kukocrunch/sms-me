<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$env = new envloader;

$account_sid = $_ENV["TWILIO_ACCT_SID"];
$auth_token = $_ENV["TWILIO_AUTH_TOKEN"];
$twilio_number = $_ENV["TWILIO_PHONE_NUMBER"];

function responsemsg($success, $message){
    $response = array("success" => $success, "message" => $message);
    echo json_encode($response);
} 

if( !isset($_POST['message']) || !empty($mes) ){
    die(responsemsg(false, 'Error : Empty message!', true));
}

$client = new Client($account_sid, $auth_token);

try{
    $client->messages->create(
        $_POST['phone'],
        array(
            'from' => $twilio_number,
            'body' => $_POST['message']
        )
    );

    die(responsemsg(true,"Successfully sent!"));
}
catch (Exception $error){
    $detail['status'] = $error->getStatusCode();
    $detail['error_code'] = $error->getCode();
    $detail['message'] = $error->getMessage();
    die(responsemsg(false,$detail));
}