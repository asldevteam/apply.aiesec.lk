<?php
 header('Access-Control-Allow-Origin: *');


 include_once "./config.php";
 include_once "./sheet_ogv.php";


 if (!isset($_POST['product']) ||
     !isset($_POST['first_name']) ||
     !isset($_POST['last_name']) ||
     !isset($_POST['email']) ||
     !isset($_POST['phone']) ||
     !isset($_POST['countries']) ||
     !isset($_POST['g-recaptcha-response'])){
     $output = json_encode(array('type' => 'fail', 'text' => "Incomplete form"));
     die($output);
 }

 if(!isset($_POST['entity'])){
     $_POST['entity'] = "Others";
 }

 if(!isset($_POST['track'])){
     $_POST['track'] = "";
 }

 if(!isset($_POST['institute_text'])){
     $_POST['institute_text'] = "";
 }

 $product = $_POST['product'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $countries = '';
 foreach($_POST['countries'] as $country){
     $countries .= $country . ',';
 }

 $entity = $_POST['entity'];
 $track = $_POST['track'];
 $institute = $_POST['institute_text']; 
 $gcaptcha = $_POST['g-recaptcha-response'];

 $url = "https://www.google.com/recaptcha/api/siteverify";
 $data = array(
     'secret' => $gcaptcha_private,
     'response' => $gcaptcha,
     'remoteip' => $_SERVER['REMOTE_ADDR']
 );

$curlConfig = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $data
);

$curl = curl_init();
curl_setopt_array($curl, $curlConfig);
$response = curl_exec($curl);
curl_close($curl);

$response = json_decode($response, true);

$date = new DateTime("now", new DateTimeZone('Asia/Colombo') );
$timestamp = $date->format('Y-m-d H:i:s');

    $url = "Not provided";
$res = append([[$timestamp, $first_name, $last_name, $email, $phone,$countries, $track]], $entity);

if ($res) {
    $output = json_encode(array('type' => 'success', 'text' => "Details successfully submitted."));
    die($output);
} else{
    $output = json_encode(array('type' => 'fail', 'text' => "An unknown error occurred."));
    die($output);
}

?>